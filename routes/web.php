<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthxController;
use App\http\Controllers\UserController;


#AUTENTICAÇÃO [bonus]
Route::get('/login', [AuthxController::class, 'login_view']);
Route::post('/auth/login', [AuthxController::class, 'authLogin']);

Route::get('/cadastro', [AuthxController::class, 'cadastro_view']);
Route::post('/auth/cadastro', [AuthxController::class, 'authCadastro']);

#USER
Route::get('/user/{id}', [UserController::class, 'perfil_view']);

//SAIR
Route::get('/logout', [AuthxController::class, 'logout']);