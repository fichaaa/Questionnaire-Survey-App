<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionnaireController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/questionnaires/create', [QuestionnaireController::class, 'create']);
Route::post('/questionnaires' , [QuestionnaireController::class, 'store']);

Route::get('questionnaires/{questionnaire}', [QuestionnaireController::class, 'show']);

Route::get('/questionnaires/{questionnaire}/questions/create', [QuestionController::class, 'create']);
Route::post('/questionnaires/{questionnaire}/questions', [QuestionController::class, 'store']);
Route::delete('/questionnaires/{questionnaire}/questions/{question}', [QuestionController::class, 'destroy']);

Route::get('/surveys/{questionnaire}-{slug}', [SurveyController::class, 'show']);
Route::post('/surveys/{questionnaire}-{slug}', [SurveyController::class, 'store']);