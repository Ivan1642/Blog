<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PostController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\CommentController;
    

    Route::get('/', function () {
        return redirect()->route('posts.index');
    });

    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
     ->name('comments.store');
    Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, 'destroy'])
     ->name('comments.destroy');