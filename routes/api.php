<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//
// USER
//
// USER - Create reviewer
Route::post('user', 'Api\UserController@create')->name('user.create');

//
// DISCIPLINE
//
// DISCIPLINE - Index of all disciplines
Route::get('disciplines', 'Api\DisciplineController@index')->name('discipline.index');
