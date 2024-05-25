<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CepController;
Use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view('welcome');
});

Route::get('/', function() {
    return redirect('/home');
});

Route::get('/login', function() {
    return view('login.index');
});

Route::get('/register', function() {
    return view('register.index');
});

Route::get('/register/employee',function() {
    return view('register.employee');
});

Route::get('/register/service',function(){
    return view('register.service');
});

Route::controller(ClientController::class)->group(function(){
    Route::post('/register/save', 'save_new') ->name('site.register.client');
});

Route::controller(EmployeeController::class)->group(function(){
    Route::post('/register/employee/save','save_new')->name('site.register.employee');
});

Route::controller(ServiceController::class)->group(function(){
    Route::post('/register/service/save','save_new')->name('site.register.service');
});

Route::controller(AppointmentController::class)->group(function(){
    Route::get('/agendar', 'index')->name('site.register.appointment');
    Route::post('/agendar/save', 'save_new')->name('site.save.appointment');
    Route::get('/agenda/completed/{id?}', 'mark_as_complete');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('/admin', 'index')->name('site.admin');
});

Route::post('/getcep',[CepController::class,'get_cep']);


