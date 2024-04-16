<?php

use App\Models\listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\listingController;



Route::get('/', [listingController::class, 'index'] )->name('Listings');

Route::get('/listing/create', [listingController::class, 'create'] )->middleware('auth')->name('CreateListing');
Route::post('/listings', [listingController::class, 'store'] )->name('StoreListing');
Route::get('/listings/manage', [listingController::class, 'manage'])->middleware('auth');
// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');


// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



// Route::get('/listing/{id}', function ($id) {
//     $listing = listing::find($id);

//     if($listing) {
//         return view('Listing', [
//             'listing' => $listing]);
//     }
//     else {
//         abort('404');
//     }
Route::get('/listings/{listing}', [listingController::class, 'show'])->name('Listing');

