<?php

use App\Http\Controllers\Backoffice\BackofficeController;
use Illuminate\Support\Facades\Route;

route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
