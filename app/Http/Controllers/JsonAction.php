<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades;

use function response;

class JsonAction extends Controller
{
    public function __invoke(Request $request) : JsonResponse
    {
        $response = Facades\Response::json(['status' => 'success']);
        // $response = Facades\Response::jsonp('callback', ['status' => 'success']);

        // // Use helper.
        // $response = response()->json(['status' => 'success']);
        // $response = response()->jsonp('callback', ['status' => 'success']);

        // // Specify media type
        // $response = response()->json(['message' => 'laravel'], Response::HTTP_OK, [
        //     'content-type' => 'application/vnd.laravel-api+json'
        // ]);

        return $response;
    }
}
