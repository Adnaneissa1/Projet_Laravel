<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[AdminController::class,'home']);


Route::get('/home',[AdminController::class,'index'])->name('home');


Route::get('/create_room',[AdminController::class, 'create_room'])
->middleware(['auth','admin']);


Route::post('/add_room',[AdminController::class, 'add_room'])
->middleware(['auth','admin']);

Route::get('/view_room',[AdminController::class, 'view_room'])
->middleware(['auth','admin']);
Route::post('view_room_import', [AdminController::class, 'view_room_import'])->middleware(['auth','admin']);


Route::get('/delete_room/{id}',[AdminController::class, 'delete_room'])
->middleware(['auth','admin']);

Route::get('/update_room/{id}',[AdminController::class, 'update_room']);

Route::post('/edit_room/{id}',[AdminController::class, 'edit_room']);

Route::get('/room_details/{id}',[HomeController::class, 'room_datails']);

Route::get('/room_details/{id}',[HomeController::class, 'room_datails']);

Route::post('/add_booking/{id}',[HomeController::class, 'add_booking']);

Route::get('/bookings/',[AdminController::class, 'bookings'])
->middleware(['auth','admin']);

Route::get('/delete_booking/{id}',[AdminController::class, 'delete_booking'])
->middleware(['auth','admin']);

Route::get('/approve_book/{id}',[AdminController::class, 'approve_book'])
->middleware(['auth','admin']);

Route::get('/reject_book/{id}',[AdminController::class, 'reject_book'])
->middleware(['auth','admin']);

Route::get('/view_gallary',[AdminController::class, 'view_gallary'])
->middleware(['auth','admin']);

Route::post('/upload_gallary',[AdminController::class, 'upload_gallary'])
->middleware(['auth','admin']);

Route::get('/delete_gallary/{id}',[AdminController::class, 'delete_gallary'])
->middleware(['auth','admin']);

Route::post('/contact',[HomeController::class, 'contact']);

Route::get('/all_messages',[AdminController::class, 'all_messages'])
->middleware(['auth','admin']);

Route::get('/send_mail/{id}',[AdminController::class, 'send_mail'])
->middleware(['auth','admin']);

Route::post('/mail/{id}',[AdminController::class, 'mail'])
->middleware(['auth','admin']);

Route::get('/our_rooms',[HomeController::class, 'our_rooms']);

// Route::get('/generate_pdf/{id}',[HomeController::class, 'generate_pdf']);


Route::get('/hotel_gallary',[HomeController::class, 'hotel_gallary']);

Route::get('/contact_us',[HomeController::class, 'contact_us']);




















