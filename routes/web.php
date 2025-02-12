<?php

use App\Livewire\ShowPost;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'post' => Post::where('slug', 'test-post')->sole(),
    ]);
})->name('welcome');

Route::get('posts/{post:slug}', ShowPost::class)->name('posts.show');
