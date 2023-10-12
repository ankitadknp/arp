<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ActivityLogsController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\VisaTypeController;
use App\Http\Controllers\RepresentativeController;
use App\Http\Controllers\SmtpSettingController;
use App\Http\Controllers\LoginHistoryController;
use App\Http\Controllers\PipedriveSettingController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CreatedDateAssementController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BrandsSettingController;
use App\Http\Controllers\RepresentativeProfileController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;



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
    return redirect()->action([HomeController::class, 'index']);
});

Auth::routes(['register' => false,'verify' => false,'reset' => false]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::match(['get', 'post'], 'home', [HomeController::class, 'index'])->name('home');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::post('add_login_history', [HomeController::class, 'add_login_history'])->name('add_login_history');

// Route::get('/user.get_data',[UserController::class, 'get_data'])->name('get_data');
Route::resource('users', UsersController::class);
Route::resource('brands', BrandsController::class);
Route::resource('brands_setting', BrandsSettingController::class);
Route::resource('activity-logs', ActivityLogsController::class);
Route::resource('representative', RepresentativeController::class);
Route::resource('languages', LanguageController::class);
Route::resource('visa-type', VisaTypeController::class);
Route::delete('visa-image-delete', [VisaTypeController::class, 'deleteVisaImage'])->name('visa-image-delete');
Route::resource('smtp-setting', SmtpSettingController::class);
Route::resource('login-history', LoginHistoryController::class);
Route::resource('pipedeive-setting', PipedriveSettingController::class);
Route::resource('pdf', PdfController::class);
Route::resource('created_date_assement', CreatedDateAssementController::class);
Route::post('search_email', [CreatedDateAssementController::class, 'search_email'])->name('search_email');
Route::post('sent_mail', [CreatedDateAssementController::class, 'sent_mail'])->name('sent_mail');
Route::resource('report', ReportController::class);
Route::match(['get', 'post'], 'pdf_list', [PdfController::class, 'pdf_list'])->name('pdf_list');
Route::match(['get', 'post'], 'search_list', [CreatedDateAssementController::class, 'search_list'])->name('search_list');
Route::resource('representative_profile', RepresentativeProfileController::class);
Route::post('brand_delete', [BrandsController::class, 'brand_delete'])->name('brand_delete');
Route::post('signature_delete', [RepresentativeController::class, 'signature_delete'])->name('signature_delete');
Route::post('photo_delete', [RepresentativeController::class, 'photo_delete'])->name('photo_delete');

Route::get('forgot_password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot_password');
Route::match(['get', 'post'],'password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'resetPassword'])->name('password.update');

Route::get('/pdf_to_html', function () {
    return view('pdf_to_html');
});