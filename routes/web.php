<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoAdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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


Route::group(['middleware' => 'auth'], function () {

	Route::get('/', [HomeController::class, 'home']);

	Route::get(
		'dashboard',
		function () {
			return view('dashboard');
		}
	)->name('dashboard');

	Route::get(
		'billing',
		function () {
			return view('billing');
		}
	)->name('billing');

	Route::get('/antrian', [PatientController::class, 'index']);
	Route::delete('/antrian/{patient:id}', [PatientController::class, 'destroy']);

	Route::get('/tambah-pasien', [PatientController::class, 'createAddPage']);
	Route::post('/tambah-pasien', [PatientController::class, 'addPatient']);

	Route::get('/antrian/{patient:id}', [PatientController::class, 'createDetailPage']);
	Route::post('/antrian/{patient:id}', [PatientController::class, 'edit']);


	Route::get(
		'kamar',
		function () {
			return view('kamar');
		}
	)->name('kamar');

	Route::get('/logout', [SessionsController::class, 'destroy']);

	Route::get('/admin-profile', [InfoAdminController::class, 'create']);

	Route::post('/admin-profile', [InfoAdminController::class, 'store']);

	Route::get(
		'/login',
		function () {
			return view('dashboard');
		}
	)->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
	Route::get('/register', [RegisterController::class, 'create']);
	Route::post('/register', [RegisterController::class, 'store']);

	Route::get('/login', [SessionsController::class, 'create']);
	Route::post('/session', [SessionsController::class, 'store']);

	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);

	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
	return view('session/login-session');
})->name('login');