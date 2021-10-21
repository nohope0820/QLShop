<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {

    Route::group(['prefix' => 'account', 'namespace' => 'Account','middleware'=>['auth', 'manager-role']], function () {

        Route::get('', 'ListController@index');

        Route::get('delete/{id}', 'DestroyController@destroy')->name('account.destroy');

        Route::get('edit/{id}', 'UpdateController@edit');

        Route::put('/{id}', 'UpdateController@update')->name('account.update');

        Route::get('create', 'StoreController@create');

        Route::post('', 'StoreController@store')->name('account.store');
    });

    Route::group(['prefix' => 'category', 'namespace' => 'Category','middleware'=>['auth', 'admin-role']], function () {

        Route::get('', 'ListController@index');

        Route::get('delete/{id}', 'DestroyController@destroy')->name('category.destroy');

        Route::get('edit/{slug_category}', 'UpdateController@edit');

        Route::put('/{id}', 'UpdateController@update')->name('category.update');

        Route::get('create', 'StoreController@create');

        Route::post('', 'StoreController@store')->name('category.store');
    });

    Route::group(['prefix' => 'employee', 'namespace' => 'Employee','middleware'=>['auth', 'admin-role']], function () {

        Route::get('', 'ListController@index');

        Route::get('delete/{id}', 'DestroyController@destroy')->name('employee.destroy');

        Route::get('edit/{id}', 'UpdateController@edit');

        Route::put('/{id}', 'UpdateController@update')->name('employee.update');

        Route::get('create', 'StoreController@create');

        Route::post('', 'StoreController@store')->name('employee.store');
    });

    Route::group(['prefix'=>'timekeeping', 'namespace'=>'TimeKeeping','middleware'=>['auth', 'manager-role']], function () {

        Route::get('', 'MainController@index');

        Route::put('/{id}', 'StoreController@store')->name('timekeeping.store');

        Route::post('/check_by_date', 'CheckByDateController@checkByDate')->name('timekeeping.checkByDate');

        Route::post('/check_by_name', 'CheckByNameController@checkByName')->name('timekeeping.checkByName');

        Route::post('/check_salary', 'CheckSalaryController@checkSalary')->name('timekeeping.checkSalary');

        Route::post('/notes', 'NoteController@note')->name('timekeeping.note');

        Route::get('/notes', 'NoteController@index');

        Route::get('/check_salary', 'CheckSalaryController@index');

        Route::get('/check_by_date', 'CheckByDateController@index');

        Route::get('/check_by_name', 'CheckByNameController@index');
    });

    Route::group(['prefix' => 'product', 'namespace' => 'Product','middleware'=>['auth', 'admin-role']], function () {

        Route::get('', 'ListController@index');

        Route::get('delete/{id}', 'DestroyController@destroy')->name('product.destroy');

        Route::get('edit/{id}', 'UpdateController@edit');

        Route::put('/{id}', 'UpdateController@update')->name('product.update');

        Route::get('create', 'StoreController@create');

        Route::post('', 'StoreController@store')->name('product.store');

        Route::get('/editDetail/{id}', 'EditDetailController@index');

        Route::post('/them-size/{id}', 'SizeController@storeSize')->name('product.size');

        Route::post('/them-anh/{id}', 'ImageController@storeImage')->name('product.image');

        Route::get('/xoa-size/{product_id}/{id}', 'SizeController@destroySize');

        Route::get('/xoa-anh/{product_id}/{id}', 'ImageController@destroyImage');
    });

    Route::group(['prefix' => 'order', 'namespace' => 'Order', 'middleware'=>['auth', 'admin-role']], function () {

        Route::get('', 'MainController@index');

        Route::get('/thong-ke-don-hang', 'StatisticalController@index');

        Route::post('/thong-ke-don-hang', 'StatisticalController@action')->name('order.statiscalOrder');

        Route::get('/chi-tiet-don-hang/{id}', 'MainController@detail');

        Route::get('/{online}', 'MainController@type');

        Route::get('/{offline}', 'MainController@type');

        Route::get('/tao-don-hang', 'StoreController@index');

        Route::post('/tao-don-khach-quen', 'StoreController@familiarCustomer')->name('order.familiarCustomer');

        Route::post('/tao-don-khach-hang-moi', 'StoreController@newCustomer')->name('order.newCustomer');

        Route::get('xac-nhan-don-hang/info/{id}', 'StoreController@getInfo');

        Route::get('/xac-nhan-don-hang/{id}', 'StoreController@addProduct');

        Route::post('/add-product-in-order/{id}', 'StoreController@storeProduct')->name('order.storeProduct');

        Route::get('/update-product/{id}-{total}', 'StoreController@update');
    });
});
