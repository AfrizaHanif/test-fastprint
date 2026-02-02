<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Models\Produk;
use App\Models\Status;
use App\Models\Kategori;
use App\Models\Setting;

class MainController extends Controller
{
    public function index()
    {
        // Get data from database
        $data = Produk::where("status_id", 1)->get();
        $kategori = Kategori::all();
        $statuses = Status::all();

        // Return to view
        return view('page', compact(['data', 'kategori', 'statuses']));
    }

    public function refresh()
    {
        // Call to fetch data from API
        $result = $this->getData();
        $status = $result['status'];

        // Check if fetch success / fail
        if ($status == 'success') { // Success
            $message = 'Seluruh data telah terupdate';
        } else { // Fail
            $message = $result['message'] ?? 'Gagal update data';
        }

        // Return to view
        return redirect()->route('main.index')->with(['status' => $status, 'message' => $message]);
    }

    public function getData()
    {
        // URL of API
        $api_url = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';

        // Get credentials from database or use fallback
        $username = Cache::remember('api_username', 3600, function () {
            return Setting::where('key', 'api_username')->value('value');
        });
        $password = Cache::remember('api_password', 3600, function () {
            return Setting::where('key', 'api_password')->value('value');
        });

        // Authentication of API (Might change by API)
        $postData = [
            'username' => $username,
            'password' => md5($password),
        ];

        /** @var \Illuminate\Http\Client\Response $response */
        // Fetch API with POST method
        $response = Http::asForm()->post($api_url, $postData);

        // Check if the request failed (400, 401, 500, etc.)
        if ($response->failed()) {
            Log::error('API Request Failed', [
                'status' => $response->status(),
                'body' => $response->json() ?? $response->body(),
                'headers' => $response->headers(),
                'cookies' => $response->cookies(),
            ]);

            // Extract error message from API response
            $errorMessage = 'Gagal mengambil data (Status: ' . $response->status() . ')';
            $json = $response->json();
            if (isset($json['ket'])) {
                $errorMessage = $json['ket'];
            } elseif (isset($json['message'])) {
                $errorMessage = $json['message'];
            }
            return ['status' => 'fail', 'message' => $errorMessage];
        }

        // Check if fetch has been success
        if ($response->successful()) {
            // Get data of API as JSON
            $data = $response->json();

            // Loop per item of data
            foreach ($data['data'] ?? [] as $item) {
                // Validate data
                $validator = Validator::make($item, [
                    'id_produk'   => 'required|numeric',
                    'nama_produk' => 'required|string',
                    'harga'       => 'required|numeric',
                    'kategori'    => 'required|string',
                    'status'      => 'required|string',
                ]);

                // Check if validate fails
                if ($validator->fails()) {
                    Log::error('Validation failed for item:', [
                        'item' => $item,
                        'errors' => $validator->errors()->all(),
                    ]);
                    continue;
                }

                // Create the status if it doesn't exist, or get the existing one
                $status = Status::firstOrCreate([
                    'nama_status' => $item['status'],
                ]);

                // Create the category if it doesn't exist, or get the existing one
                $kategori = Kategori::firstOrCreate([
                    'nama_kategori' => $item['kategori'],
                ]);

                // Save API data to database
                Produk::updateOrCreate(
                    ['id_produk' => $item['id_produk']],
                    [
                        'nama_produk' => $item['nama_produk'],
                        'harga' => $item['harga'],
                        'kategori_id' => $kategori->id_kategori,
                        'status_id' => $status->id_status,
                    ]
                );
            }

            // Return to function with success status
            return ['status' => 'success'];
        }

        // Return to function with fail status (Plus message)
        return ['status' => 'fail', 'message' => 'Unknown error occurred'];
    }
}
