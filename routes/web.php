<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

use Illuminate\Support\Facades\Route;

Route::get('/brandfor','brandforfreecontroller@brandforfree');




Route::get('/brand','webcontroller@brand');

Route::get('/printoption', 'printoptioncontroller@printoption');



Route::get('/reg', 'reg_brandforfreecontroller@reg_brandforfree');




//Route::get('/', 'WebController@index')->name('index');
//Route::get('/blog', 'WebController@blog')->name('blog');
//Route::get('/contact-us', 'WebController@contact')->name('contact');
//Route::post('/contact-message', 'WebController@contactMsg')->name('contactMsg');
//Route::get('/about-us', 'WebController@about_us')->name('about_us');
//Route::get('/all-products', 'WebController@all_products')->name('all_products');
//Route::get('/product-detail/{id}', 'WebController@productdetail')->name('productdetail');
//Route::get('/portfolio-products-categories/{name}', 'WebController@portfolio')->name('portfolio');
//Route::get('/blog/{id}/{slug}', 'WebController@blogpost')->name('blogpost');
//Route::post('/comment', 'WebController@comment')->name('comment')//;

//Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');
Route::post('/place-order', 'OrderController@place_order')->name('place_order');

Route::group(['middleware'=> ['admin']],function(){

    Route::get('/products', 'HomeController@products')->name('products');
    Route::post('/update-role/{id}', 'HomeController@updateRole')->name('updateRole');
    Route::get('/new-product', 'HomeController@newproduct')->name('newproduct');//*



    Route::get('/orders', 'OrderController@index')->name('orders');

    Route::post('/update_order/{id}', 'OrderController@update_order')->name('update_order');




    Route::post('/add-product', 'HomeController@addproduct')->name('addproduct');

    Route::post('/add-product-image', 'HomeController@addprodimg');
    Route::get('/delete-product-image', 'HomeController@delprodimg');

    Route::post('/add-feature', 'HomeController@addfeature');
    Route::get('/delete-feature', 'HomeController@delfeature');

    Route::post('/add-quantity', 'HomeController@addquantity');
    Route::get('/delete-quantity', 'HomeController@delquantity');

    Route::post('/add-spec', 'HomeController@addspec')->name('addspec');
    Route::get('/delete-spec', 'HomeController@delspec');

    Route::post('/add-producttype', 'HomeController@addproducttype');
    Route::get('/delete-producttype', 'HomeController@delproducttype');


    Route::get('/save-product/{id}', 'HomeController@saveproduct')->name('saveproduct');
    Route::get('/edit-product/{id}', 'HomeController@editproduct')->name('editproduct');
    Route::post('/update-product/{id}', 'HomeController@addproduct');
    Route::get('/delete-product/{id}', 'HomeController@delproduct')->name('delproduct');
    Route::get('/change-product-status/{id}', 'HomeController@changestat')->name('changestat');

    Route::get('/all-posts', 'HomeController@allposts')->name('allposts');
    Route::get('/new-post', 'HomeController@newpost')->name('newpost');
    Route::post('/save-post', 'HomeController@savepost')->name('savepost');
    Route::get('/edit-post/{id}', 'HomeController@editpost')->name('editpost');
    Route::get('/users', 'HomeController@users')->name('users');
});
\*

