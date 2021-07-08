<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use function redirect;
use function response;

class RedirectAction extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $response = Response::redirectTo('/home');
        // $response = response()->redirectTo('/home');
        // $response = redirect('/home');

        // $response = redirect('/home')
        //     ->withInput($request->all())
        //     ->with('error', 'validation error.');

        return $response;
    }
}
