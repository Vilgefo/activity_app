<?php

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
Route::get('/admin/activity', [\App\Http\Controllers\SiteController::class, 'show'])->where('route', '.*');
Route::get('{route}', function() {return 'route saved. Go to <a href="/admin/activity">/admin/activity</a>';})->where('route', '.*');


