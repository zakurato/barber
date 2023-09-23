<?php

use App\Http\Controllers\HomeController;
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

Route::get("/",[HomeController::class,"index"])->name("index");


Route::get("formLogin",[HomeController::class,"formLogin"])->name("formLogin");
Route::post("verificarDatos",[HomeController::class,"verificarDatos"])->name("verificarDatos");
Route::get("loginDentro",[HomeController::class,"loginDentro"])->name("loginDentro")->middleware("auth");
Route::POST("logout",[HomeController::class,"logout"])->name("logout")->middleware("auth");


//horarios
Route::get("horarios",[HomeController::class,"horarios"])->name("horarios")->middleware("auth");
Route::get("crearHorario",[HomeController::class,"crearHorario"])->name("crearHorario")->middleware("auth");
Route::post("storeHorario",[HomeController::class,"storeHorario"])->name("storeHorario")->middleware("auth");
Route::post("deleteHorario",[HomeController::class,"deleteHorario"])->name("deleteHorario")->middleware("auth");
Route::get("editarHorario",[HomeController::class,"editarHorario"])->name("editarHorario")->middleware("auth");
Route::post("storeEditarHorario",[HomeController::class,"storeEditarHorario"])->name("storeEditarHorario")->middleware("auth");



