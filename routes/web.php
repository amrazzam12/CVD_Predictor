<?php

use App\Http\Controllers\CvdController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::post('check' , [CvdController::class , 'index']);
