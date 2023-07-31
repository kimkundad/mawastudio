<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\OrderController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/email', [App\Http\Controllers\HomeController::class, 'email'])->name('email');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['UserRole:superadmin|admin']], function() {

	
	Route::post('api/api_post_status_user', [App\Http\Controllers\DashboardController::class, 'api_post_status_user']);

	Route::get('/admin/verify_checkin', [App\Http\Controllers\DashboardController::class, 'verify_checkin']);

	Route::get('/admin/test', [App\Http\Controllers\DashboardController::class, 'test']);

	Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
	Route::get('admin/edit_seasts/{id}', [App\Http\Controllers\DashboardController::class, 'edit_seasts']);
	Route::post('admin/postSeasts/{id}', [App\Http\Controllers\DashboardController::class, 'postSeasts']);
	Route::post('admin/edit_order_by_seasts/{id}', [App\Http\Controllers\DashboardController::class, 'edit_order_by_seasts']);
	Route::post('admin/add_order_by_seasts/{id}', [App\Http\Controllers\DashboardController::class, 'add_order_by_seasts']);

	Route::resource('/admin/MyUser', MyUserController::class);
    Route::post('/api/api_post_status_MyUser', [App\Http\Controllers\MyUserController::class, 'api_post_status_MyUser']);
    Route::get('api/del_MyUser/{id}', [App\Http\Controllers\MyUserController::class, 'del_MyUser']);

	Route::resource('/admin/events', EventsController::class);
    Route::post('/api/api_post_status_events', [App\Http\Controllers\EventsController::class, 'api_post_status_events']);
    Route::get('api/del_events/{id}', [App\Http\Controllers\EventsController::class, 'del_events']);

	Route::resource('/admin/order', OrderController::class);
    Route::post('/api/api_post_status_order', [App\Http\Controllers\OrderController::class, 'api_post_status_order']);
    Route::get('api/del_order/{id}', [App\Http\Controllers\OrderController::class, 'del_order']);

});

Route::get('/images/{file}', function ($file) {
	$url = Storage::disk('do_spaces')->temporaryUrl(
	  $file,
	  date('Y-m-d H:i:s', strtotime("+5 min"))
	);
	if ($url) {
	   return Redirect::to($url);
	}
	return abort(404);
  })->where('file', '.+');
