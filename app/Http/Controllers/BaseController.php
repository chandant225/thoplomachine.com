<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    public function reportSuccess($message, $payload = array())
    {
        return [
            "status" => true,
            "message" => $message,
            "payload" => $payload,
        ];
    }

    public function reportError($message)
    {
        return [
            "status" => false,
            "message" => $message,
        ];
    }
}