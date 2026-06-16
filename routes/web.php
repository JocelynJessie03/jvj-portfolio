<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

/*
|--------------------------------------------------------------------------
| Web Routes – Jocelyn Vanessa Jessie Portfolio
|--------------------------------------------------------------------------
*/

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects');
Route::post('/contact', [PortfolioController::class, 'contact'])->name('contact');
Route::post('/subscribe', [PortfolioController::class, 'subscribe'])->name('subscribe');
