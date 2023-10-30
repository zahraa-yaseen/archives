
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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/books/create', 'BookController@create')->name('books.create');
        Route::post('/book', 'BookController@store')->name('books.store');
        Route::get('/books/index', 'BookController@index')->name('books.index');
        Route::get('/books/{id}', 'BookController@show')->name('books.show');
        Route::delete('/books/delect/{id}', 'BookController@destroy')->name('books.destroy');
        Route::get('/books/edit/{id}', 'BookController@edit')->name('books.edit');
        Route::put('/book/update/{id}', 'BookController@update')->name('books.update');

/**
         * user_types Routes
         */
        Route::get('/user_types/create', 'UserTypeController@create')->name('user_types.create');
        Route::post('/user_types/add', 'UserTypeController@store')->name('user_types.store');

       /** users  Routes
        */
        Route::get('/users/index', 'UserController@index')->name('users.index');
        Route::get('/users/create', 'UserController@create')->name('users.create');

        Route::put('/users/update/{id}', 'UserController@update')->name('users.update');
        //Route::get('/users/create', 'UserController@create')->name('users.create');
        Route::post('/users/store', 'UserController@store')->name('users.store');


/**
         * departs Routes
         */
        Route::get('/departs', 'DepartController@create')->name('departs.create');
        Route::get('/departs/index', 'DepartController@index')->name('departs.index');
        Route::get('/departs/show', 'DepartController@show')->name('departs.show');
        Route::post('/debarts/store', 'DepartController@store')->name('departs.store');
        Route::delete('/departs/destroy', 'DepartController@destroy')->name('departs.destroy');
        Route::get('/departs/edit', 'DepartController@edit')->name('departs.edit');



        /**
         * divisions Routes
         */
        Route::get('/divisions', 'DivisionController@create')->name('divisions.create');
        Route::post('/divisions/store', 'DivisionController@store')->name('divisions.store');

        

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        /**
         * book Routes
         */
        





        

    });
});

/*
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


Route::get('/', function () {
    return view('welcome');
});
Route::view('admin','admin');*/