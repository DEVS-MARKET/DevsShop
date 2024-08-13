<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (!function_exists('modifyEnv')) {
    function modifyEnv($envKey, $envValue): void
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        $oldValue = env($envKey);
        if ($oldValue) {
            $str = str_replace("{$envKey}={$oldValue}", "{$envKey}={$envValue}", $str);
        } else {
            $str .= "\n{$envKey}={$envValue}";
        }

        $fp = fopen($envFile, 'w');
        fwrite($fp, $str);
        fclose($fp);
    }
}

if (!function_exists('settings')) {
    function settings($key)
    {
        return Cache::get('settings.' . $key, function () use ($key) {
            $setting = Setting::where('key', $key)->first();
            if ($setting) {
                Cache::put('settings.' . $key, $setting->value, now()->addDay());
                return $setting->value;
            }
            return null;
        });
    }
}
