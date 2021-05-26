<?php

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Business;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Spatie\Analytics\Analytics;
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

// Laravel file manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/', function () {
    return view('welcome');
});

// Profile
Route::patch('profile/{uuid}', 'ProfileController@update')->name('profile.update');
Route::resource('profile', 'ProfileController');

Route::get('/analytics', function () {
    return view('analytics');
})->name('analytics');

Route::get('/test', function () {
    $business = Business::all()->first();
    // dd($business->id);
    return view('test', compact('business'));
})->name('test');

Route::post('/test', function (Request $request) {

return view('test');
})->name('test');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('users', function () {
    $users = User::paginate('10');
    return view('users', ['users' => $users]);
})->name('users');

// Route::get('seo', function () {
//     $users = User::paginate('10');
//     return view('seo', ['users' => $users]);
// })->name('seo');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Resourceful Controllers
Route::resource('articles', 'ArticleController');
Route::resource('products', 'ProductController');
Route::resource('services', 'ServiceController');
Route::resource('business', 'BusinessController');

Route::get('seo', 'BusinessController@index')->name('seo');
Route::post('seo', 'BusinessController@store')->name('seo');

Route::resource('comment', 'CommentController')->except('edit', 'show');

Route::get('analytics', 'AnalyticsController')->name('analytics');

// Route::get('analytics', function () {
//     //retrieve visitors and pageview data for the current day and the last seven days
//     $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
//     // dd($analyticsData);
//     return view('analytics', compact('analyticsData'));
// });
