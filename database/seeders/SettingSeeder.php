<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Use updateOrCreate to prevent duplicates if the seeder is run multiple times
        Setting::updateOrCreate(
            ['key' => 'api_url'],
            ['value' => 'https://recruitment.fastprint.co.id/tes/api_tes_programmer']
        );
        Setting::updateOrCreate(
            ['key' => 'api_username'],
            ['value' => 'tesprogrammer310126C22']
        );
        Setting::updateOrCreate(
            ['key' => 'api_password'],
            ['value' => 'bisacoding-31-01-26']
        );
    }
}
