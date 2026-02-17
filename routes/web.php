<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PostController;

    Route::get('/', function() {
        return view('layouts.app');
    });

    Route::resource('posts', PostController::class)->only(['index', 'show']);
