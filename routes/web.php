<?php

use App\Http\Controllers\Dashboard\CivilStatesController;
use App\Http\Controllers\Dashboard\ExamTypeController;
use App\Http\Controllers\Dashboard\PaymentPhasesController;
use App\Http\Controllers\Dashboard\RegistrationController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return redirect()->route('dashboard');
});
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false
]);

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('user',\App\Http\Controllers\Dashboard\UserController::class);
    Route::resource('veicle_class',\App\Http\Controllers\Dashboard\VeicleClassController::class);
    Route::resource('period',\App\Http\Controllers\Dashboard\PeriodController::class);
    Route::get('profile',[HomeController::class,'profile'])->middleware('auth')->name('profile');
    Route::resource('registration',RegistrationController::class);
    Route::resource('civil_state',CivilStatesController::class);
    Route::resource('payment_phase',PaymentPhasesController::class);
    Route::resource('exam_type',ExamTypeController::class);

    Route::controller(StudentController::class)->group(function () {
        Route::get('/student/{student}', 'show')->name('student.show');
        Route::get('/student', 'index')->name('student.index');
        Route::delete('/student/{student}', 'destroy')->name('student.destroy');
    });
});
