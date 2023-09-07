<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConjointController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnfantController;
use App\Http\Controllers\EnvoieController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\SubenvoieController;
use App\Http\Controllers\SubreceptionController;
use App\Models\Reception;
use App\Models\Subenvoie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        'users' => UserController::class,
        'doctors' => DoctorController::class,
        'conjoints' => ConjointController::class,
        'enfants' => EnfantController::class,
        'envoies' => EnvoieController::class,
        'receptions' => ReceptionController::class,
        'subenvoies'=> SubenvoieController::class,
        'subreceptions'=> SubreceptionController::class
    ]);
    
    Route::get('/folders',function (){
        return view('folders.main');
    })->name('folders');
    
    
    
    Route::get('/get-employee-data/{matricule}', [UserController::class, 'getEmployeeData'])->name('get.employee.data');
    Route::get('/get-employee-children/{matricule}', [UserController::class, 'getEmployeeChild'])->name('get.employee.child');
    Route::get('/get-employee-partner/{matricule}', [UserController::class, 'getEmployeePartner'])->name('get.employee.partner');
    Route::get('/get-subfolders/{matricule}', [SubenvoieController::class,'getAllSubfolders'])->name('get.subfolders');
    Route::get('get-employee-links/{matricule}',[UserController::class,'getEmployeeLinks'])->name('get.employee.links');
    Route::get('relations/{id}',[UserController::class ,'showRelated'])->name('get.employee.relations');
    Route::get('/subfolders/{numEnvoie}', [EnvoieController::class,'getSubfolders'])->name('get.envoiesubfolders');
    Route::get('/subreception/{numReception}', [ReceptionController::class,'getSubfolders'])->name('get.receptionsubfolders');
    
    // Authentication Routes
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    // Email Verification Routes
    Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware(['throttle:6,1'])->name('verification.send');
    // Logout Route
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
require __DIR__.'/auth.php';

