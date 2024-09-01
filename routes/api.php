<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('redirect-response', function(Request $request) {
    $url = base64_decode($request->url);
    $response = Http::withHeaders([
        'accept' => 'application/json',
        ])->get($url, $request->except('url'))->collect();
    return json_encode($response);
});
