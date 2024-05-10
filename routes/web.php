<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authenticate;

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


//Authentication==================================
Route::get('/home', [AdminController::class,  'index'])->name('home');

//Home=====================================================
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/about', 'about');
    Route::get('/our_rooms', 'our_rooms');
    Route::get('/gallery', 'gallery');
    Route::get('/blog', 'blog');
    Route::get('/contact', 'contact');
    Route::get('/room_details/{id}', 'room_details');
    Route::post('/add_booking/{id}', 'add_booking');
    Route::post('/contact', 'add_contact');
});
//Admin====================================================

Route::controller(AdminController::class)->middleware(['auth', 'admin'])->group(function () {
    Route::get('/add_room', 'add_room');
    Route::post('/add_room', 'create_room');
    Route::get('/view_rooms', 'view_rooms');
    Route::get('/delete_room/{id}', 'delete_room');
    Route::get('/edit_room/{id}', 'edit_room');
    Route::post('/update_room/{id}', 'update_room');
    Route::get('/view_bookings', 'view_bookings');
    Route::get('/delete_booking/{id}', 'delete_booking');
    Route::get('/approve_booking/{id}', 'approve_booking');
    Route::get('/reject_booking/{id}', 'reject_booking');
    Route::get('/view_gallery', 'view_gallery');
    Route::post('/add_image_gallery', 'add_image_gallery');
    Route::get('/delete_image/{id}', 'delete_image');
    Route::get('/view_messages', 'view_messages');
    Route::get('/send_email/{id}', 'send_email');
    Route::post('/send_email/{id}', 'email');
});
