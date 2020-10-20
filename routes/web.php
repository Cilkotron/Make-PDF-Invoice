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
    return view('welcome');
});

// Route::get('/invoice', 'HomeController@getInvoice')->name('invoice');
// Route::get('/invoice', 'HomeController@getInvoice')->name('invoice');
// Route::get('/create', 'InvoiceController@create')->name('create');

Auth::routes();
Route::post('/contact', 'ContactController@send')->name('contact.send');


Route::group(['middleware' => 'auth'], function()
{
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('service', 'ServiceController');
    Route::resource('company', 'CompanyController');
    Route::resource('settings', 'SettingsController');

    Route::get('/contact', 'ContactController@index')->name('message.index');
    Route::get('/contact/{id}/edit', 'ContactController@edit')->name('message.edit');
    Route::post('/contact/{id}','ContactController@status')->name('message.status');
    Route::delete('/contact/{id}', 'ContactController@destroy')->name('message.delete');

    Route::get('/add-to-invoice/{id}', 'ServiceController@getAddToInvoice')->name('service.addToInvoice');
    Route::get('/invoice', 'ServiceController@getInvoice')->name('service.invoice');
    Route::get('/reduce/{id}', 'ServiceController@getReduceByOne')->name('service.reduceByOne');
    Route::get('/remove/{id}', 'ServiceController@getRemoveItem')->name('service.remove');

    Route::get('/bill', 'ServiceController@getBill')->name('service.bill');
    Route::post('/bill', 'ServiceController@postBill')->name('service.addBill');
    Route::get('/bill/{id}', 'ServiceController@pdfBill')->name('service.pdfBill');
    Route::delete('/bill/{id}', 'ServiceController@deleteBill')->name('service.delete');
});

