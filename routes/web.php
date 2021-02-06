<?php

Route::get('/', 'WelcomeController@index')->name('welcome.index');

// Auth
Auth::routes();

// Home page
Route::resource('home', "AdminController");
// Post cotroller

// Header Controller
Route::resource('header', 'HeaderController');
// Footer Controller
Route::resource('footer', 'FooterController');
// Section Controller
Route::get('section', 'SectionController@index')->name('section.index');
Route::get('section/create/{id}', 'SectionController@create')->name('section.create');
Route::post('section/create/{id}', 'SectionController@store')->name('section.store');
Route::get('section/show/{id}', 'SectionController@show')->name('section.show');
Route::get('section/{id}/edit','SectionController@edit')->name('section.edit');
Route::patch('section/create/{id}', 'SectionController@update')->name('section.update');
Route::delete('section/{id}', 'SectionController@destroy')->name('section.destroy');
// Sous Section
//Route::get('sousection/{section}', 'SousectionController@index')->name('sousection.index');
Route::get('sousection/create/{section}', 'SousectionController@create')->name('sousection.create');
Route::post('sousection/{section}', 'SousectionController@store')->name('sousection.store');
Route::get('sousection/{id}/edit', 'SousectionController@edit')->name('sousection.edit');
Route::patch('sousection/{section}', 'SousectionController@update')->name('sousection.update');
Route::delete('sousection/{section}', 'SousectionController@destroy')->name('sousection.destroy');
// Logo Controller
Route::get('logo/create', 'LogoController@create')->name('logo.create');
Route::post('logo/create', 'LogoController@store')->name('logo.store');