<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SurveyController;
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
Route::view('/', 'welcome');

Route::post('register', [UserController::class, 'register']);

Route::post('login', [UserController::class, 'login']);
Route::post('is_valid', [UserController::class, 'is_user_input_valid']);


Route::group(['middleware' => ['auth:sanctum']], function ($var = null) {
    Route::get('all_users', [UserController::class, 'all_account']);
    Route::get('delete/{id}', [UserController::class, 'delete_account']);
    Route::get('search/{user_name}', [UserController::class, 'search_account']);
    Route::post('update/{id}', [UserController::class, 'update_account']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::get('survey', [SurveyController::class, 'questions']);
    Route::post('upload', [UserController::class, 'upload_pic']);
});
