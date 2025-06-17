<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', [JobController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/jobs/create', [JobController::class, 'create']);
    Route::post('/jobs', [JobController::class, 'store']);
    Route::get('/myjobs', [JobController::class, 'getUserJobs']);
});

Route::middleware('auth')
    ->can('update', 'job')
    ->group(function () {
        Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
        Route::patch('/jobs/{job}', [JobController::class, 'update']);
        Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
    });

Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/companies', [EmployerController::class, 'index']);
Route::get('/companies/{employer}', [EmployerController::class, 'show']);

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');
