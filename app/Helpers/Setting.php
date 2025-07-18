<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

if (! function_exists('setting')) {
    function setting($key, $default = null)
    {
        // Gunakan cache agar lebih efisien
        $settings = Cache::rememberForever('app_settings', function () {
            return DB::table('settings')->pluck('value', 'key')->toArray();
        });

        return $settings[$key] ?? $default;
    }
}