<?php
use Kleinespende\Models\Button;
use Kleinespende\Models\Receiver;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['api']], function () {
    Route::post('/buttons/{id}/click', 'ButtonsController@click');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::model('button', Button::class);
    Route::resource('button', ButtonsController::class);

    Route::model('receiver', Receiver::class);
    Route::resource('receiver', ReceiversController::class);

    Route::get('/home', 'HomeController@index');
});
