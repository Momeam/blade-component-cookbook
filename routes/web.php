<?php

use App\Livewire\ComponentPlayground;
use Illuminate\Support\Facades\Route;

Route::get('/', ComponentPlayground::class)->name('home');
