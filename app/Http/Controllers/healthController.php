<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class healthController extends Controller
{
    public function __invoke()
    {

        return new Response(Redis::get('name'), Response::HTTP_OK);
    }
}
