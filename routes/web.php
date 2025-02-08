<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosisController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [DiagnosisController::class, 'showForm']);
Route::post('/diagnose', [DiagnosisController::class, 'diagnose']);