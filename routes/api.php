<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MalzemelerController;
use App\Http\Controllers\DepoSorumlulariController;
use App\Http\Controllers\SorumlularController;
use App\Http\Controllers\FirmalarController;
use App\Http\Controllers\DepolarController;
use App\Http\Controllers\StokHareketleriController;
use App\Http\Controllers\Auth\LoginController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('malzemeler',MalzemelerController::class);
Route::apiResource('depo-sorumlulari',DepoSorumlulariController::class);
Route::apiResource('sorumlular',SorumlularController::class);
Route::apiResource('firmalar',FirmalarController::class);
Route::apiResource('depolar',DepolarController::class);
Route::apiResource('stok-hareketleri',StokHareketleriController::class);

Route::post('/login',LoginController::class);
