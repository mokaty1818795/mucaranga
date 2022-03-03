<?php

use App\Http\Controllers\Dashboard\CivilStatesController;
use App\Http\Controllers\Dashboard\DocumentUploadController;
use App\Http\Controllers\Dashboard\ExamTypeController;
use App\Http\Controllers\Dashboard\InvoiceController;
use App\Http\Controllers\Dashboard\PaymentPhasesController;
use App\Http\Controllers\Dashboard\RegistrationController;
use App\Http\Controllers\Dashboard\RegistrationPaymentController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\HomeController;
use App\Models\Registration;
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
    Route::get('/finances', [App\Http\Controllers\HomeController::class, 'finances'])->name('finances');
    //finances
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
    Route::controller(DocumentUploadController::class)->group(function(){
        Route::post('document_upload/{student}','uploadFile')->name('document.upload');
        Route::post('document_delete/{media}','removeFile')->name('document.remove');
    });

    Route::controller(RegistrationPaymentController::class)->group(function(){
        Route::post('/registration_payment','store')->name('registration_payment.store');
    });

    Route::controller(InvoiceController::class)->group(function(){
        Route::get('/payment_invoices/{invoice}/{student}/{exam_token}','index')->name('payment_invoices');
    });
});
