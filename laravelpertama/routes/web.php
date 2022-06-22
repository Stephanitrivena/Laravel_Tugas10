<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\GroupsController;
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

Route::get('/', 'App\Http\Controllers\CobaController@index');
// Route::get('/friends', 'App\Http\Controllers\CobaController@index');
// Route::get('/friends/create', 'App\Http\Controllers\CobaController@create');
// Route::post('/friends', 'App\Http\Controllers\CobaController@store');
// Route::get('/friends/{id}', 'App\Http\Controllers\CobaController@show');
// Route::get('/friends/{id}/edit', 'App\Http\Controllers\CobaController@edit');
// Route::put('/friends/{id}', 'App\Http\Controllers\CobaController@update');
// Route::delete('/friends/{id}', 'App\Http\Controllers\CobaController@destroy');


Route::resources([
    'friends' => CobaController::class,
    'groups' => GroupsController::class,
]);

Route::get('/groups/addmember/{group}', [GroupsController::class, 'addmember']);
Route::put('/groups/addmember/{group}', [GroupsController::class, 'updatemember']);
Route::put('/groups/deletemember/{group}', [GroupsController::class, 'deletemember']);