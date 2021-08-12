<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.settings.application');
    }

    //global settings to create and update the settings with single image

    public function update(Request $request)
     {
         foreach ($request->types as $key => $type) {

           if($type == 'site_name'){
                $this->overWriteEnvFile('APP_NAME', $request[$type]);
            }

            if($type == 'timezone'){
                $this->overWriteEnvFile('APP_TIMEZONE', $request[$type]);
            }
            else {
                $settings = Setting::where('type', $type)->first();
                if($settings != null){
                    if($request->hasFile($type)){

                        $file = $request->file($type);
                        $file_name = time().'_'.$file->getClientOriginalName();
                        $full_file_path = $request->file($type)->storeAs('images', $file_name, 'public');
                        $settings->value = $full_file_path;
                    }
                    else if(gettype($request[$type]) == 'array') {
                        $settings->value = json_encode($request[$type]);

                    } else {

                        $settings->value = $request[$type];
                    }
                    $settings->save();
                }
                else{
                    $settings = new Setting;
                    $settings->type = $type;
                    if($request->hasFile($type)){

                        $file = $request->file($type);
                        $file_name = time().'_'.$file->getClientOriginalName();
                        $full_file_path = $request->file($type)->storeAs('images', $file_name, 'public');
                        $settings->value = $full_file_path;
                    }
                    else if(gettype($request[$type]) == 'array') {
                        $settings->value = json_encode($request[$type]);

                    } else {

                        $settings->value = $request[$type];
                    }
                    $settings->save();
                }
            }
        }
        return back();
     }


}
