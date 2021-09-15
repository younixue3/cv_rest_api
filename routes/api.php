<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\rest_api\UserController;
use App\Http\Controllers\rest_api\RegisterController;
use App\Http\Controllers\rest_api\LoginController;
use App\Http\Controllers\rest_api\LogoutController;
use App\Http\Controllers\rest_api\BlogController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('register', RegisterController::class);
    Route::post('login', LoginController::class);
    Route::post('logout', LogoutController::class);
});

Route::get('testing', UserController::class);
Route::group(['prefix' => 'blog'], function () {
    Route::get('index', [BlogController::class, 'index']);
    Route::post('store', [BlogController::class, 'store']);
    Route::delete('destroy/{id}', [BlogController::class, 'destroy']);
    Route::put('update/{id}', [BlogController::class, 'update']);
});
