<?php // Code within app\Helpers\Helper.php
use App\Models\Menu;
use App\Models\Settings;
use App\Models\Blog;
use App\Models\Visa;
use App\Models\Activity;


if (!function_exists('getCurrentMenu')) {
    function getCurrentMenu($route)
    {
        return Menu::where('route',$route)->first() ?? null;
    }
}

if (!function_exists('getSettings')) {
    function getSettings($key)
    {
        return Settings::where('setting_key',$key)->first()->setting_value;
    }
}

if (!function_exists('getCurrentBlog')) {
    function getCurrentBlog($slug)
    {
        return Blog::where('slug',$slug)->first();
        
    }
}

if (!function_exists('getCurrentVisa')) {
    function getCurrentVisa()
    {
        return Visa::where('status',1)->orderBy('id', 'desc')->get();
    }
}

if (!function_exists('getCurrentActivity')) {
    function getCurrentActivity()
    {
        return Activity::where('status', 1)
                ->where(function ($query) {
                    $query->where('activity_type', 'Adventure Tours & Activities')
                          ->orWhere('activity_type', 'Best Selling Activities - Dubai');
                })
                ->orderBy('id', 'desc')
                ->get();
    }
}
