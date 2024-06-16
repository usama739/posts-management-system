<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $posts = [];

    // if user is logged-in, then show them its posts
    if(auth()->check()){
        $posts = auth()->user()->userCoolPosts()->get();
    }

    return view('WelcomeFile', ['posts' => $posts]);        // pass all posts to the blade template
});


Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/login', [UserController::class, 'login']);


// post related routes
Route::Post('/create-post', [PostController::class, 'createPost']);

Route::get('/edit-post/{postID}', [PostController::class, 'ShowEditScreen']);

Route::put('/edit-post/{postID}', [PostController::class, 'UpdatePost']);


Route::delete('/delete-post/{postID}', [PostController::class, 'DeletePost']);
