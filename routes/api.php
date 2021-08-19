<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\DisorderController;
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

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('all_users', [UserController::class, 'all_account']);
    Route::get('delete/{id}', [UserController::class, 'delete_account']);
    Route::get('search/{user_name}', [UserController::class, 'search_account']);
    Route::post('update/{id}', [UserController::class, 'update_account']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('upload', [UserController::class, 'upload_pic']);
    Route::get('survey', [SurveyController::class, 'questions_and_associated_answers']);

});

Route::view('/', 'welcome');
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('is_valid', [UserController::class, 'is_user_input_valid']);

//Survey Routes
Route::post('add_survey_question',[SurveyController::class,'add_survey_question']);
Route::post('add_survey_answer/{id}',[SurveyController::class,'add_survey_answer']);
Route::get('get_answer_from_question/{id}',[SurveyController::class,'get_answers_from_question']);
Route::post('update_survey_question/{id}',[SurveyController::class,'update_survey_question']);
Route::post('update_survey_answer/{id}',[SurveyController::class,'update_survey_answer']);
Route::post('delete_survey/{id}',[SurveyController::class,'delete_survey']);

//Disorder Routes
Route::post('add_disorder',[DisorderController::class,'insert_disorder']);
Route::get('delete_disorder/{id}',[DisorderController::class,'delete_disorder']);
Route::get('disorder_therapist',[DisorderController::class,'disorder_related_therapists']);

