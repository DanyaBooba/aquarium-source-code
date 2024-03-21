<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $data = (object) [
            "name" => "Get Name",
            "value" => 123
        ];

        return json_encode($data);
    }

    public function test()
    {
        return "test";
    }
}
