<?php

use App\Http\Controllers\Api\TestJobController;
use Illuminate\Support\Facades\Route;

Route::post('/test-job', TestJobController::class);
