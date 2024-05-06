

<?php // Code within app\Helpers\Helper.php

use App\Models\Settings;

if (!function_exists('getSettings')) {
    function getSettings($key)
    {
        return Settings::where('setting_key',$key)->first()->setting_value;
    }
}