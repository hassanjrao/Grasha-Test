<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('lang-change', [HomeController::class, 'langChange'])->name('home.langChange');



Route::prefix("survey")->name("survey.")->group(function () {

    Route::get("questions", [SurveyController::class, "questions"])->name("questions");
    Route::get("possible-answers", [SurveyController::class, "possibleAnswers"])->name("possible-answers");


    Route::get("{type}", [SurveyController::class, "index"])->name("index");
    Route::post("submit-user-info", [SurveyController::class, "submitUserInfo"])->name("submit-user-info");


    Route::post("submit-answers", [SurveyController::class, "submitAnswers"])->name("submit-answers");
});

