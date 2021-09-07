<?php

namespace App\Models;

use Google\Service\AIPlatformNotebooks\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'value'];


    public static function clearCache()
    {
        Cache::forget('app_settings');
    }

}
