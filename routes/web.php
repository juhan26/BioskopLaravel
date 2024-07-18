<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\UserController;
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



// Route::get('/movies/show/{movie}', [MovieController::class, 'show'])->name('movies.show');
// Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
// Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
// Route::put('/movies/show/{movie}', [MovieController::class, 'update'])->name('movies.update');



Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'auth'])->name('auth');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [MovieController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    
    Route::resource('movies', MovieController::class);
    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');


    // Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');

    
    // Route::get('/movies/{movie}/book/{date}/{showtime}', [BookingController::class, 'create'])->name('bookings.create');
    // Route::post('/movies/{movie}/book/{date}/{showtime}', [BookingController::class, 'store'])->name('bookings.store');
    
    // Route::get('/bookings', [BookingController::class, 'create'])->name('bookings.index');   
    // Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    // Route::patch('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');

    // Route::post('/bookings/{movie}/{date}/{showtime}', [BookingController::class, 'store'])->name('bookings.store');

    // Showtimes(Sano)
    Route::get('/showtimes', [App\Http\Controllers\ShowtimeController::class, 'index'])->name('showtimes.index');
    Route::get('/showtimes/create', [App\Http\Controllers\ShowtimeController::class, 'create'])->name('showtimes.create');
    Route::post('/showtimes', [App\Http\Controllers\ShowtimeController::class,'store'])->name('showtimes.store');
    Route::get('/showtimes/edit/{showtime}', [App\Http\Controllers\ShowtimeController::class, 'edit'])->name('showtimes.edit');
    Route::put('/showtimes/update/{showtime}', [App\Http\Controllers\ShowtimeController::class, 'update'])->name('showtimes.update');
    Route::delete('/showtimes/destroy/{showtime}', [App\Http\Controllers\ShowtimeController::class, 'destroy'])->name('showtimes.destroy');



    //Date(Sano)
    Route::get('/date',[App\Http\Controllers\DateController::class, 'index'])->name('date.index');
    Route::get('/date/create',[App\Http\Controllers\DateController::class, 'create'])->name('date.create');
    Route::post('/date',[App\Http\Controllers\DateController::class,'store'])->name('date.store');
    Route::get('/date/edit/{date}',[App\Http\Controllers\DateController::class, 'edit'])->name('date.edit');
    Route::put('/date/update/{date}',[App\Http\Controllers\DateController::class, 'update'])->name('date.update');
    Route::delete('/date/destroy/{date}',[App\Http\Controllers\DateController::class, 'destroy'])->name('date.destroy');

    //Dateshowtime(sano)
    Route::get('/dateshowtime', [App\Http\Controllers\DateshowtimeController::class, 'index'])->name('dateshowtime.index');
    Route::get('/dateshowtime/create', [App\Http\Controllers\DateshowtimeController::class, 'create'])->name('dateshowtime.create');
    Route::post('/dateshowtime/store', [App\Http\Controllers\DateshowtimeController::class,'store'])->name('dateshowtime.store');
    Route::get('/dateshowtime/edit/{dateshowtime}', [App\Http\Controllers\DateshowtimeController::class, 'edit'])->name('dateshowtime.edit');
    Route::put('/dateshowtime/update/{dateshowtime}', [App\Http\Controllers\DateshowtimeController::class, 'update'])->name('dateshowtime.update');
    Route::delete('/dateshowtime/destroy/{dateshowtime}', [App\Http\Controllers\DateshowtimeController::class, 'destroy'])->name('dateshowtime.destroy');

    //Seat(sano)
    Route::get('/seat', [App\Http\Controllers\SeatController::class, 'index'])->name('seat.index');
    Route::get('/seat/create', [App\Http\Controllers\SeatController::class, 'create'])->name('seat.create');
    Route::post('/seat/store', [App\Http\Controllers\SeatController::class,'store'])->name('seat.store');
    Route::get('/seat/edit/{seat}', [App\Http\Controllers\SeatController::class, 'edit'])->name('seat.edit');
    Route::put('/seat/update/{seat}', [App\Http\Controllers\SeatController::class, 'update'])->name('seat.update');
    Route::delete('/seat/destroy/{seat}', [App\Http\Controllers\SeatController::class, 'destroy'])->name('seat.destroy');

    //Bookings(sano)
    Route::get('/booking', [App\Http\Controllers\BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/create', [App\Http\Controllers\BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/store', [App\Http\Controllers\BookingController::class,'store'])->name('booking.store');
    Route::get('/booking/edit/{booking}', [App\Http\Controllers\BookingController::class, 'edit'])->name('booking.edit');
    Route::put('/booking/update/{booking}', [App\Http\Controllers\BookingController::class, 'update'])->name('booking.update');
    Route::delete('/booking/destroy/{booking}', [App\Http\Controllers\BookingController::class, 'destroy'])->name('booking.destroy');


    //Studios(Sano)
    Route::resource('studios',StudioController::class);
    // Route::delete('/studios/destroy/{names}', [StudioController::class, 'destroy'])->name('studios.destroy');
});
