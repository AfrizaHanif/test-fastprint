<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display the settings form.
     */
    public function index()
    {
        // Get data
        $api_url = Setting::where('key', 'api_url')->value('value');
        $username = Setting::where('key', 'api_username')->value('value');
        $password = Setting::where('key', 'api_password')->value('value');

        // Return to view
        return view('settings', compact('api_url', 'username', 'password'));
    }

    /**
     * Store or update the settings.
     */
    public function store(Request $request)
    {
        // Validate Data
        $request->validate([
            'api_url' => 'required|string',
            'api_username' => 'required|string',
            'api_password' => 'required|string',
        ], [
            'api_url.required' => 'URL wajib diisi',
            'api_username.required' => 'Username wajib diisi',
            'api_password.required' => 'Password wajib diisi',
        ]);

        // Create / Update data (Update if exists, Create if not exists)
        Setting::updateOrCreate(
            ['key' => 'api_url'],
            ['value' => $request->api_url]
        );
        Setting::updateOrCreate(
            ['key' => 'api_username'],
            ['value' => $request->api_username]
        );
        Setting::updateOrCreate(
            ['key' => 'api_password'],
            ['value' => $request->api_password]
        );

        // Return to view
        return redirect()->route('settings.index')->with('success', 'Pengaturan berhasil disimpan.');
    }

    public function logs()
    {
        $logPath = storage_path('logs/laravel.log');
        $logs = [];

        if (file_exists($logPath)) {
            // Read the file into an array, reverse it to see latest first, and take 100 lines
            $logs = file($logPath);
            $logs = array_slice(array_reverse($logs), 0, 100);
        }

        return view('logs', compact('logs'));
    }
}
