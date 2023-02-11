<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReasonController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mime\MessageConverter;

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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home', function(){
    if (Auth::user()->role == 'admin' || Auth::user()->role == 'dokter') {
        return redirect('dashboard');
    } else {return redirect('/');}});
Route::get('/diagnosis', [HomeController::class, 'diagnosis'])->name('diagnosis');
Route::get('/info', [HomeController::class, 'info'])->name('info');
Route::post('/message', [MessageController::class, 'store'])->name('message.store');

// Guest Only
Route::middleware('guest')->group(function() {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login.action');
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.action');
    Route::post('/getregencies', [RegisterController::class, 'get_regencies'])->name('get.regencies');
    Route::post('/getdistricts', [RegisterController::class, 'get_districts'])->name('get.districts');
    Route::post('/getvillages', [RegisterController::class, 'get_villages'])->name('get.villages');
});

Route::middleware('auth', 'role:pasien')->group(function() {
    Route::prefix('profile')->group(function() {
        Route::get('/', [HomeController::class, 'profile'])->name('home.profile');
        Route::put('/', [HomeController::class, 'profile_update'])->name('home.profile.update');
        Route::put('/password', [HomeController::class, 'profile_password'])->name('home.profile.password');
        Route::post('/getregencies', [HomeController::class, 'get_regencies'])->name('home.get.regencies');
        Route::post('/getdistricts', [HomeController::class, 'get_districts'])->name('home.get.districts');
        Route::post('/getvillages', [HomeController::class, 'get_villages'])->name('home.get.villages');
    });

    Route::get('/diagnosis/create', [HomeController::class, 'diagnosis_create'])->name('diagnosis.create');
    Route::post('/diagnosis/store', [HomeController::class, 'diagnosis_store'])->name('diagnosis.store');
});

Route::get('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('dashboard')->middleware('auth')
    ->group(function() {
        Route::group(['middleware' => ['role:admin,dokter']], function() {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
            Route::put('/profile', [DashboardController::class, 'profile_update'])->name('dashboard.profile.update');
            Route::put('/profile/password', [DashboardController::class, 'profile_password'])->name('dashboard.profile.password');
            Route::post('/profile/getregencies', [DashboardController::class, 'get_regencies'])->name('dashboard.get.regencies');
            Route::post('/profile/getdistricts', [DashboardController::class, 'get_districts'])->name('dashboard.get.districts');
            Route::post('/profile/getvillages', [DashboardController::class, 'get_villages'])->name('dashboard.get.villages');
        });
        Route::group(['middleware' => ['role:admin']], function() {
            Route::get('/homesetting', [FrontendController::class, 'index'])->name('home.setting');
            Route::put('/homesetting', [FrontendController::class, 'update'])->name('home.action');

            Route::resource('message', MessageController::class)->except(['create', 'store', 'show', 'edit', 'update']);

            Route::resource('user', UserController::class);
            Route::prefix('user')->group(function() {
                Route::put('/reset/{user}', [UserController::class, 'reset'])->name('user.reset');
                Route::post('/getregencies', [UserController::class, 'get_regencies'])->name('user.get.regencies');
                Route::post('/getdistricts', [UserController::class, 'get_districts'])->name('user.get.districts');
                Route::post('/getvillages', [UserController::class, 'get_villages'])->name('user.get.villages');
            });
        });
        Route::group(['middleware' => ['role:dokter']], function() {
            Route::resource('disease', DiseaseController::class);
            Route::resource('symptom', SymptomController::class);
            Route::resource('treatment', TreatmentController::class);
            Route::resource('reason', ReasonController::class);
            Route::resource('history', HistoryController::class)->except(['create', 'store', 'edit', 'update']);
        });
});