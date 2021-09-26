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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {

    Route::group(['prefix' => 'account', 'namespace' => 'Account','middleware'=>['auth', 'manager-role']], function () {

        Route::get('', 'ListController@index');

        Route::get('delete/{id}', 'DestroyController@destroy')->name('account.destroy');

        Route::get('edit/{id}', 'UpdateController@edit');

        Route::put('/{id}', 'UpdateController@update')->name('account.update');

        Route::get('create', 'StoreController@create');

        Route::post('', 'StoreController@store')->name('account.store');
    });

    Route::group(['prefix' => 'category', 'namespace' => 'Category'], function () {

        Route::get('', 'ListController@index');

        Route::get('delete/{id}', 'DestroyController@destroy')->name('category.destroy');

        Route::get('edit/{slug_category}', 'UpdateController@edit');

        Route::put('/{id}', 'UpdateController@update')->name('category.update');

        Route::get('create', 'StoreController@create');

        Route::post('', 'StoreController@store')->name('category.store');
    });

    Route::group(['prefix' => 'employee', 'namespace' => 'Employee'], function () {

        Route::get('', 'ListController@index');

        Route::get('delete/{id}', 'DestroyController@destroy')->name('employee.destroy');

        Route::get('edit/{id}', 'UpdateController@edit');

        Route::put('/{id}', 'UpdateController@update')->name('employee.update');

        Route::get('create', 'StoreController@create');

        Route::post('', 'StoreController@store')->name('employee.store');
    });

    Route::group(['prefix'=>'timekeeping', 'namespace'=>'TimeKeeping', 'middleware'=>['auth', 'manager-role']], function () {

        Route::get('', 'MainController@index');

        // Route::get('delete/{id}', 'DestroyController@destroy')->name('employee.destroy');

        // Route::get('edit/{id}', 'UpdateController@edit');

        // Route::put('/{id}', 'UpdateController@update')->name('employee.update');

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
});
