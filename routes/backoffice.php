<?php

use App\Http\Controllers\Backoffice\DashboardController;
use Illuminate\Support\Facades\Route;

route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
