<?php

use App\Models\Page;
use App\Models\Service;
use Illuminate\Support\Str;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;

if(!function_exists('changeDateFormate')){
    function changeDateFormate($date,$date_format){
        return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
    }
}

if(!function_exists('productImagePath')){
    function productImagePath($image_name)
    {
        return public_path('images/products/'.$image_name);
    }
}

if(!function_exists('set_setting')){

    function set_setting($type, $value, $default = null)
    {
        Setting::clearCache();

        return Setting::updateOrCreate(
            ['type' => $type],
            ['value' => $value]
        );
    }
}

if(!function_exists('get_setting')){
    function get_setting($type, $default =  null)
    {
        Cache::remember('app_settings', now()->addHours(6), function () {
            return Setting::all();
        });

        $setting = Cache::get('app_settings', collect([]))->where('type', $type)->first();

        return $setting !=null ? $setting->value : $default;
    }
}

if(!function_exists('get_storage_location')){
    function get_storage_location()
    {
        return URL::asset('storage');
    }
}

if(!function_exists('formated_date')){
    function formated_date($date)
    {
        return \Carbon\Carbon::parse($date)->toFormattedDateString();
    }
}


if(!function_exists('footer_services')){
    function footer_services($items = 4) {
        $service= Service::orderBy('id', 'desc')->take($items)->get();
        return $service;
    }
}



if(!function_exists('get_pages_list')){

    function get_pages_list()
    {
        return Page::select('title', 'slug')->get();
    }
}
