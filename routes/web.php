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

Route::get('/', function () {
    return view('auth.login');
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('invoices','InvoicesController');




Route::resource('section','SectionsController');

Route::resource('products','ProductsController');


Route::resource('InvoiceAttachments','InvoicesAttachmentsController');

Route::get('/section/{id}', 'InvoicesController@getproducts');

Route::get('edit_invoice/{id}','InvoicesController@edit');


Route::get('InvoicesDetails/{id}','InvoicesDetailsController@edit');


Route::get('View_file/{invoice_number}/{file_name}','InvoicesDetailsController@open_file');

Route::get('status_show/{id}','InvoicesController@show');

Route::post('/Status_Update/{id}', 'InvoicesController@Status_Update')->name('Status_Update');

Route::get('download/{invoice_number}/{file_name}','InvoicesDetailsController@download');

Route::post('delete_file','InvoicesDetailsController@destroy')->name("delete_file");


Route::get('Invoice_Paid','InvoicesController@Invoice_Paid');

Route::get('Invoice_UnPaid','InvoicesController@Invoice_UnPaid');

Route::get('Invoice_Partial','InvoicesController@Invoice_Partial');

Route::get('Print_invoice/{id}','InvoicesController@Print_invoice');


Route::get('export_invoices', 'InvoicesController@export');


Route::get('invoices_report', 'invoices_report@index');



Route::post('Search_invoices', 'Invoices_Report@Search_invoices');




Route::resource('Archive', 'InvoiceAchiveController');


Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles','RoleController');

    Route::resource('users','UserController');

    });



Route::get('customers_report', 'Customers_Report@index')->name("customers_report");

Route::post('Search_customers', 'Customers_Report@Search_customers');



Route::get('/{page}', 'AdminController@index');
