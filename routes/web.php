<?php

use App\Http\Controllers\PricingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PricingController::class, 'index'])->name('pricing.index');
