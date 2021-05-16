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
use Illuminate\Validation\ValidationException;
use App\Models\User;
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

// register
Route::get('register', function(Request $request){
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);

    return $user;
});

// login
Route::post('login', function(Request $request){
    $credentials = $request->only('email', 'password');

    if(! auth()->attempt($credentials)){
        throw ValidationException::withMessages([
            'email' => 'Invalid credentials'
        ]);
    }

    $request->session()->regenerate();

    return response()->json(null, 201);
});

// logout

Route::post('logout', function(Request $request){
    auth()->guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return response()->json(null, 200);
});