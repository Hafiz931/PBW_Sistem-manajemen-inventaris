<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController; // Import controller

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('items.index'); // Redirect root ke halaman index item
});

Route::resource('items', ItemController::class);
