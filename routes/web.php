<?php

use App\Livewire\ShowPost;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('posts/{post:slug}', ShowPost::class)->name('posts.show');
