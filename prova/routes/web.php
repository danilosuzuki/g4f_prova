<?php

use App\Http\Controllers\ProvaController;
use App\Http\Controllers\Questao1Controller;
use App\Http\Controllers\Questao2Controller;
use App\Http\Controllers\Questao3Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ProvaController::class,'index']);
Route::get('/questao1',[Questao1Controller::class,'index']);
Route::get('/questao2',[Questao2Controller::class,'index']);
Route::get('/questao3',[Questao3Controller::class,'index']);
Route::get('/questao3/proxima/{horario}/{dia}/{serie}',[Questao3Controller::class,'proximaSerie']);