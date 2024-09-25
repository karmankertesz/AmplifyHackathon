<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MatterController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::redirect('/', '/dashboard');

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


   Route::get('/matters',[MatterController::class,'index'])->name('matters.index');
   Route::get('/matters/matcher',[MatterController::class,'matcher'])->name('matters.matcher');
   Route::post('/matters/getMatchingMatters',[MatterController::class,'getMatchingMatters'])->name('matters.getMatchingMatters');
   Route::post('/matters/getMatchingLawyers',[MatterController::class,'getMatchingLawyers'])->name('matters.getMatchingLawyers');


   Route::get('/lawyers',[LawyerController::class,'index'])->name('lawyers.index');
});

require __DIR__.'/auth.php';
