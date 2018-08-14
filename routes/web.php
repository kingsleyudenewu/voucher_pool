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

Route::get('/', 'VoucherCodeController@index')->name('index');
Route::get('/allVoucher', 'VoucherCodeController@allVoucher')->name('allVoucher');

Route::get('/recipients','RecipientController@index')->name('recipients.index');
Route::get('/recipients/create','RecipientController@create')->name('recipients.create');
Route::post('/recipients','RecipientController@store')->name('recipients.store');
Route::get('/all_recipient', 'RecipientController@all_recipient')->name('all_recipient');


Route::get('/special_offers','SpecialOfferController@index')->name('special_offers.index');
Route::get('/special_offers/create','SpecialOfferController@create')->name('special_offers.create');
Route::post('/special_offers','SpecialOfferController@store')->name('special_offers.store');
Route::get('/all_special_offer', 'SpecialOfferController@all_special_offer')->name('all_special_offer');


