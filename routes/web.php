<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Labownercontroller;
use App\Http\Controllers\LabDetailsController;
use App\Http\Controllers\Clientcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TestDetailController;

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

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm']);
Route::post('forget-password-email', [ForgotPasswordController::class, 'submitForgetPasswordForm']);
Route::get('reset-password-page/{token}', [ForgotPasswordController::class, 'showResetPasswordForm']);
Route::post('reset-password-now', [ForgotPasswordController::class, 'submitResetPasswordForm']);

Route::get('/',[HomeController::class,'home']);
Route::get('labs',[HomeController::class,'labs_page']);
Route::get('book_appointment/{id}',[HomeController::class,'booking']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('login_view',[LoginController::class,'index']);
Route::get('register_view',[RegistrationController::class,'index']);
Route::post('register_user',[RegistrationController::class,'register_user']);
Route::post('login_user',[LoginController::class,'login_user']);

Route::get('users',[UserController::class,'index']);
Route::any('make_labowner/{id}',[UserController::class,'make_labowner']);
Route::any('sign_out',[UserController::class,'logout']);

Route::get('lab_profile',[Labownercontroller::class,'index']);
Route::get('view_appointments',[Labownercontroller::class,'view_appointments']);
Route::post('create_lab_profile',[LabDetailsController::class,'store']);
Route::get('view_lab_details',[LabDetailsController::class,'show']);
Route::get('edit_lab_profile/{id}',[LabDetailsController::class,'edit']);
Route::any('delete_lab_profile/{id}',[LabDetailsController::class,'destroy']);
Route::post('update_lab_profile/{id}',[LabDetailsController::class,'update']);

Route::get('make_appointment',[AppointmentController::class,'index']);
Route::get('appointment_details/{id}',[AppointmentController::class,'appointment_show']);
Route::any('create_appointment/{id}',[AppointmentController::class,'create']);
Route::get('view_user_appointment',[AppointmentController::class,'edit']);
Route::get('cancel_appointment/{id}',[AppointmentController::class,'cancel']);
Route::post('search',[AppointmentController::class,'searchforlabortest']);
Route::any('approve_appointment/{id}',[AppointmentController::class,'approve']);
Route::get('view-test-results', [AppointmentController::class, 'viewResults']);

Route::controller(MpesaController::class)->group(function(){
    Route::post('stkpush','Stk');
    Route::get('pay','index');
});

// Route::controller(ReportController::class)->group(function(){
//     Route::any('lab_reports','labowner');
// });

//Report generation
Route::get('/report', [ReportController::class, 'generateReport'])->name('report.genRep');


//test_details
Route::get('view-test-details', [TestDetailController::class, 'index'])->name('test.index');
Route::get('test-details', [TestDetailController::class, 'create'])->name('test.create');
Route::post('test-details', [TestDetailController::class, 'store']);
Route::get('test-details/{test_detail}/edit', [TestDetailController::class, 'edit'])->name('test.edit');
// Route::get('test-details/{post}', [TestDetailController::class, 'show'])->name('test.show');
Route::put('test-details/{test_detail}', [TestDetailController::class, 'update'])->name('test.update');
Route::delete('test-details/{test_detail}', [TestDetailController::class, 'destroy'])->name('test.destroy');




require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
