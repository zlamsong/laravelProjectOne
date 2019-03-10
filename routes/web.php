<?php
Route::group(['namespace' => 'Frontend'], function (){
    Route::any('/','ApplicationController@index')->name('index');
    Route::any('about','ApplicationController@about')->name('about');
    Route::any('userLogin', 'ApplicationController@userLogin')->name('userLogin');

});

Route::group(['namespace'=>'Backend'], function(){
    Route::any('login', 'AdminController@login')->name('login');
//    Route::any('password-reset/{token?}', 'AdminController@resetFrom')->name('password-reset');
//    Route::any('password-email', 'AdminController@resetLinkEmail')->name('password-email');

});

Route::group(['namespace' => 'Backend','prefix' =>'@admin-laravel11am', 'middleware' => 'auth'], function (){
    Route::any('/','DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'privilege'], function (){
        Route::any('/','privilegeController@index')->name('privilege');
        Route::any('add-privilege','privilegeController@addPrivilege')->name('add-privilege');
        Route::any('delete-privilege/{id?}','privilegeController@deletePrivilege')->name('delete-privilege');
        Route::any('edit-privilege/{id?}','privilegeController@editPrivilege')->name('edit-privilege');
        Route::any('edit-privilege-action','privilegeController@editPrivilegeAction')->name('edit-privilege-action');
        Route::any('update-privilege-status','privilegeController@updatePrivilegeStatus')->name('update-privilege-status');
    });

    Route::group(['prefix' => 'users', 'middleware' => 'status'], function (){
        Route::any('users','AdminController@index')->name('users');
        Route::any('add-user','AdminController@addUser')->name('add-user');
        Route::any('delete-user/{id?}', 'AdminController@deleteUser')->name('delete-user');
        Route::any('edit-user/{id?}', 'AdminController@editUser')->name('edit-user');
        Route::any('edit-user-action', 'AdminController@editUserAction')->name('edit-user-action');
        Route::any('update-user-status','AdminController@updateUserStatus')->name('update-user-status');

    });

    Route::any('logout', 'AdminController@logout')->name('logout');

});