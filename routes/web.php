<?php

Route::get('/', 'MainController@index')->name('main');

Route::post('/', 'MainController@store')->name('main.store');


Route::get('/multi-checkbox', 'MultiCheckboxController@index')->name('multi_checkbox');

Route::post('/multi-checkbox/destroy', 'MultiCheckboxController@destroy')->name('multi_checkbox.destroy');

Route::any('/multi-checkbox/export', 'MultiCheckboxController@export')->name('multi_checkbox.export');


Route::get('/dependable-dropdown', 'DependableDropdownController@index')->name('dependable_dropdown');

Route::post('/dependable-dropdown/attributes', 'DependableDropdownController@attributes')->name('dependable_dropdown.attributes');

Route::post('/dependable-dropdown/store', 'DependableDropdownController@store')->name('dependable_dropdown.store');
