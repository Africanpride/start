<?php

use App\Models\User;
use App\Models\Profile;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/photos', function () {
    return view('photos');
});
Route::get('/photos', function () {
    $profile = auth()->user()->profile;
    return view('photos', compact('profile'));
});

Route::post('photos', 'ProfileController@photos');




Route::resource('profile', ProfileController::class);

Route::get('/analytics', function () {
    return view('analytics');
})->name('analytics');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('users', function () {
    $users = User::paginate('10');
    return view('users', ['users' => $users]);
})->name('users');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
