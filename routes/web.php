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



Route::group([
    'namespace' => 'Frontend'
],function(){
    //blog
    Route::get('/blog', 'BlogController@index')->name('frontend.blog.list');
    Route::get('/blog/detail/{id}','BlogController@show')->name('frontend.blog.detail');
    //home
    Route::get('/index', 'IndexController@index')->name('home');
    Route::post('/index/ajax_add_cart', 'IndexController@addtocart');
    Route::get('/cart', 'CartController@index');
    Route::post('/cart_ajax_cong', 'CartController@cong');
    Route::post('/cart_ajax_tru', 'CartController@tru');
    Route::post('/cart_ajax_delete', 'CartController@delete');
    Route::get('/product-detail/{id}','ProductdetailController@show')->name('frontend.product-detail');

    Route::post('/search', 'IndexController@search');
    Route::get('/advance_search', 'SearchController@index');
    Route::post('/advance_search', 'SearchController@store');

    Route::post('/ajax_search', 'IndexController@searchPrice');
    

    Route::group(
        ['middleware' => 'memberNotLogin'
    ],function(){
        Route::get('/member-login', 'MemberController@showLogin')->name('memberLogin');
        Route::post('/member-login', 'MemberController@login');

        Route::get('/member-register', 'MemberController@showRegister');
        Route::post('/member-register', 'MemberController@register');
    });

    Route::group(
        ['middleware' => 'member'
    ],function(){
        //bao mat 2 lop
        Route::post('/blog/ajax_rate','BlogController@rate');
        Route::post('/blog/detail/{id}','BlogController@cmt');
        //account
        Route::get('/account','MemberController@show')->name('frontend.member.account');
        Route::post('/account','MemberController@update');
        //product
        Route::get('/account/product','ProductController@index')->name('frontend.member.product');
        Route::get('/account/product/add','ProductController@create')->name('frontend.member.product.add');
        Route::post('/account/product/add','ProductController@store');
        Route::get('/account/product/edit/{id}','ProductController@edit')->name('frontend.member.product.edit');
        Route::post('/account/product/edit/{id}','ProductController@update');
        Route::get('/account/product/destroy/{id}','ProductController@destroy')->name('frontend.member.product.destroy');

    });

    


});

Auth::routes();

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Auth'
], function () {
    Route::get('/', 'LoginController@showLoginForm');
    Route::get('/login', 'LoginController@showLoginForm');
    Route::post('/login', 'LoginController@login');
    Route::get('/logout', 'LoginController@logout');

});


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'admin'
],function(){

    Route::get('/dashboard','DashboardController@index')->name('admin.dashboard');
    Route::get('/user/profile','UserController@edit')->name('admin.profile');
    Route::post('/user/profile','UserController@update')->name('admin.profile');

    Route::get('/country', 'CountryController@index')->name('admin.country');
    Route::get('/country/remove/{id}', 'CountryController@destroy')->name('admin.country.remove');
    Route::get('/country/add', 'CountryController@create')->name('admin.country.create');
    Route::post('/country/add', 'CountryController@store')->name('admin.country.store');
    Route::get('/country/edit/{id}', 'CountryController@edit')->name('admin.country.edit');
    Route::post('/country/edit/{id}', 'CountryController@update')->name('admin.country.update');

    Route::get('/blog', 'BlogController@index')->name('admin.blog');
    Route::get('/blog/remove/{id}', 'BlogController@destroy')->name('admin.blog.remove');
    Route::get('/blog/add','BlogController@create')->name('admin.blog.create');
    Route::post('/blog/add','BlogController@store')->name('admin.blog.store');
    Route::get('/blog/edit/{id}','BlogController@edit')->name('admin.blog.edit');
    Route::post('/blog/edit/{id}','BlogController@update')->name('admin.blog.update');

    Route::get('/brand', 'BrandController@index')->name('admin.brand');
    Route::get('/brand/add', 'BrandController@create')->name('admin.brand.create');
    Route::post('/brand/add', 'BrandController@store')->name('admin.brand.store');
    Route::get('/brand/remove/{id}', 'BrandController@remove')->name('admin.brand.remove');
    Route::get('/brand/edit/{id}', 'BrandController@edit')->name('admin.brand.edit');
    Route::post('/brand/edit/{id}', 'BrandController@update')->name('admin.brand.update');

    Route::get('/category', 'CategoryController@index')->name('admin.category');
    Route::get('/category/add', 'CategoryController@create')->name('admin.category.create');
    Route::post('/category/add', 'CategoryController@store')->name('admin.category.store');
    Route::get('/category/remove/{id}', 'CategoryController@remove')->name('admin.category.remove');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
    Route::post('/category/edit/{id}', 'CategoryController@update')->name('admin.category.update');
});





