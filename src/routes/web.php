<?php

use Illuminate\Support\Facades\Route;
use Laravia\Contact\App\Http\Controllers\ContactController;

Route::get('/laravia/contacts', [ContactController::class, 'index'])->name('laravia.contact::index')->middleware(['web', 'auth']);
Route::get('/laravia/contact/{id?}', [ContactController::class, 'edit'])->name('laravia.contact::edit')->middleware(['web', 'auth']);
Route::post('/laravia/contact/store', [ContactController::class, 'store'])->name('laravia.contact::store')->middleware(['web', 'auth']);
