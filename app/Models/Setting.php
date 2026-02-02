<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = ['key', 'value'];

    protected static function booted(): void
    {
        // Clear old cache
        static::saved(function (Setting $setting) {
            Cache::forget($setting->key);
        });
        // Clear old cache if setting has been deleted
        static::deleted(function (Setting $setting) {
            Cache::forget($setting->key);
        });
    }
}
