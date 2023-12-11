
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
    

        

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
 
       
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {

        
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
      
        
Route::get('/books_create_{id}', 'BookController@create')->name('books.create');


        Route::post('/book_{id}', 'BookController@store')->name('books.store');
        Route::get('/book_show{id}', 'BookController@show')->name('books.show');
        Route::delete('/book/delect/{id}', 'BookController@destroy')->name('book.destroy');
        Route::get('/books_edit_{id}', 'BookController@edit')->name('books.edit');
        Route::put('/book/update/{id}', 'BookController@update')->name('books.update');
        //Route::get('/books/Published', 'PublishedController@show')->name('published.show');

        /**
     * book_types 
     */
    Route::get('/booktypes_index', 'BookTypeController@index')->name('book_types.index');
    Route::delete('/books/delect/{id}', 'BookTypeController@destroy')->name('booktype.destroy');

    Route::get('/allbooks_show_{id}', 'BookTypeController@show')->name('allbooks.show');

    Route::get('/booktypes_create', 'BookTypeController@create')->name('book_types.create');
    Route::post('/booktypes/store', 'BookTypeController@store')->name('book_types.store');
/**
         * user_types Routes
         */
        Route::get('/usertypes_create', 'UserTypeController@create')->name('user_types.create');
        Route::post('/usertypes_add', 'UserTypeController@store')->name('user_types.store');

       /** users  Routes
        */
        Route::get('/users_index', 'UserController@index')->name('users.index');
        Route::get('/users_create', 'UserController@create')->name('users.create');

        Route::put('/users_update_{id}', 'UserController@update')->name('users.update');
        //Route::get('/users/create', 'UserController@create')->name('users.create');
        Route::post('/users/store', 'UserController@store')->name('users.store');
        Route::delete('/user_destroy', 'UserController@destroy')->name('user.destroy');

        
/**
         * departs Routes
         */
        Route::get('/departs_create', 'DepartController@create')->name('departs.create');
        Route::get('/departs_home', 'DepartController@index')->name('departs.index');
        Route::get('/create_divisions', 'DepartController@show')->name('departs.show');
        Route::post('/debarts/store', 'DepartController@store')->name('departs.store');
        Route::delete('/departs_destroy', 'DepartController@destroy')->name('departs.destroy');
        Route::get('/departs_edit_{id}', 'DepartController@edit')->name('departs.edit');
        Route::get('/show_dividions_{id}', 'DivisionController@show')->name('show.dividions');
        Route::get('/show_user_{id}', 'UserController@show')->name('show.user');
        Route::post('/debarts_store-{id}', 'DepartController@user_store')->name('depart_user.store');
        Route::put('/depart_update_{id}', 'DepartController@update')->name('depart.update');
        Route::get('/departs_add_user_{id}', 'DepartController@add')->name('depart.adduser');
       
        
      


        /**
         * divisions Routes
         */
        
        Route::delete('/division_destroy', 'DivisionController@destroy')->name('divisions.destroy');

        Route::get('/divisions', 'DivisionController@create')->name('divisions.create');
        Route::post('/divisions/store', 'DivisionController@store')->name('divisions.store');

        Route::get('/results', function () {
           $book = App\Book::where('book_details', 'like' ,  '%' . request('search') . '%' )->get();
            return view('results.results')
            ->with('books' , $book) 
            ->with('book_details' ,  'Result : '. request('search') )
            ->with('settings',  App\Setting::first() )
            ->with('blog_name' , App\Setting::first()->blog_name)
            ->with('categories' , App\Category::take(5)->get() )   
            ->with('query' , request('search') )   ;
            
        }) ;


        

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