<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use function response;

class DownloadAction extends Controller
{
    public function __invoke(Request $request): BinaryFileResponse
    {
        $filePath = './robots.txt';

        $response = Response::download($filePath);

        // Use helper.
        // $reponse = response()->download($filePath);

        // // Use helper, and change content-type.
        // $response = response()->download(
        //     $filePath,
        //     'robots_name.txt',
        //     [
        //         'content-type' => 'text/plain'
        //     ]
        // );

        return $response;
    }
}
