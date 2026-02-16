<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RappiController;

Route::apiResource('rappi', RappiController::class);