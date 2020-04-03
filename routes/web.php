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

// Route::get('mailable', function () {
    // $creative = App\User::where('role', 'creative')->first();
    // return new App\Mail\ReviewersMatchedToCreative($creative, 'Scg9LwWG');
    // return new App\Mail\ReviewerCreated();
    // return new App\Mail\UpdateEarlyReviewer();
// });

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'middleware' => 'auth.basic'
], function() {
    //
    // DATA
    //
    // DATA - Download .csv all reviewers
    Route::get('data/reviewers', 'Api\DataController@downloadReviewers')->name('data.reviewers');
    // DATA - Download .csv all creatives
    Route::get('data/creatives', 'Api\DataController@downloadCreatives')->name('data.creatives');
});

Route::any('/', function () {
    return Redirect::away('https://supermachine.be');
});
