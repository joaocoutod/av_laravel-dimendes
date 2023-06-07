<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthxController;
use App\http\Controllers\UserController;
use App\http\Controllers\TasksController;


#AUTENTICAÇÃO [bonus]
Route::get('/login', [AuthxController::class, 'login_view']);
Route::post('/LGN99232232', [AuthxController::class, 'authLogin']);

Route::get('/cadastro', [AuthxController::class, 'cadastro_view']);
Route::post('/CDS12931321', [AuthxController::class, 'authCadastro']);

#SAIR
Route::get('/logout', [AuthxController::class, 'logout']);


#-----------------------


#USER PERFIL
Route::get('/perfil', [UserController::class, 'perfil_view']);

#TASKS VIEW
Route::get('/', [TasksController::class, 'tasks_view']);