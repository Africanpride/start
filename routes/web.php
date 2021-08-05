<?php


use Carbon\Carbon;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Business;
use App\Charts\sampleChart;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
// use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;
// use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use App\Models\ProductCategory;
use App\Models\ServiceCategory;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Route;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Spatie\Analytics\AnalyticsFacade as Analytics;


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
Route::get('test', function () {
    return view('test');
});

Route::get('test2', function () {
    return view('test2');
});

Route::get('chart', function () {

    return view('chart');
});

// Profile
Route::patch('profile/{uuid}', 'ProfileController@update')->name('profile.update');
Route::resource('profile', 'ProfileController');

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
    //
    $endDate = Carbon::now();
    // $startDate = Carbon::createFromFormat('d/m/Y', '01/06/2020');
    $startDate = Carbon::createFromDate(2021, 1, 1);
    $period = Period::create($startDate, $endDate);

    $live_users = Analytics::getAnalyticsService()->data_realtime->get('ga:'.env('ANALYTICS_VIEW_ID'), 'rt:activeVisitors')->totalsForAllResults['rt:activeVisitors'];
    $pages = Analytics::fetchMostVisitedPages($period)->max();
    $total_visitors = Analytics::newUsers(Period::days(31));
    $visitors = Analytics::totalVisits(Period::days(31));
    $topCountries = Analytics::topCountries($period)->take(13);

    $chart = (new LarapexChart)->donutChart()
    ->setTitle('Top '.  $topCountries->pluck('country')->count() . ' Visiting Countries.')
    ->setSubtitle('Since Last ' . $startDate->diffForHumans())
    ->addData($topCountries->pluck('sessions')->toArray())
    ->setLabels($topCountries->pluck('country')->toArray());

    return view('dashboard', compact('chart', 'live_users','pages', 'total_visitors', 'topCountries', 'visitors'));

})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';


Route::resource('articles', 'ArticleController');
Route::resource('products', 'ProductController');
Route::resource('category', 'ProductCategoryController');
Route::get('products.categories', function() {
    $categories = ProductCategory::all();
    return view('products.categories', compact('categories'));
})->name('products.categories');

Route::get('services.categories', function() {
    $groups = ServiceCategory::all();
    return view('services.categories', compact('groups'));
})->name('services.categories');


Route::resource('services', 'ServiceController');
Route::resource('scategory', 'ServiceCategoryController');


Route::get('seo', 'BusinessController@index')->name('seo');
Route::post('seo', 'BusinessController@store')->name('seo');
Route::resource('business', 'BusinessController');

Route::resource('comment', 'CommentController')->except('edit', 'show');
Route::get('analytics', 'AnalyticsController')->name('analytics');

