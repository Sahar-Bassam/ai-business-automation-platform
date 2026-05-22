<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiPlansController;
use Illuminate\Http\Request;

Route::get('/ai-plans', [AiPlansController::class, 'getPlans']);
