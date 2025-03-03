<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\PrivacyController;

Route::get('/', [TeamController::class, 'create'])->name('home');
Route::resource('teams', TeamController::class);
Route::get('/payments/{team}/create', [PaymentController::class, 'create'])->name('payments.create');
Route::get('/payments/{team}/confirmation', [PaymentController::class, 'confirmation'])->name('payments.confirmation');
Route::get('/conditions-generales', [TermsController::class, 'show'])->name('terms.show');
Route::get('/politique-confidentialite', [PrivacyController::class, 'show'])->name('privacy.show');
