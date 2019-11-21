<?php

// Route::redirect('/', '/login');

Route::get('/', 'HomeController@onToday');
Route::get('/all', 'HomeController@onAll')->name('jadwal.all');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Bidangs
    Route::delete('bidangs/destroy', 'BidangController@massDestroy')->name('bidangs.massDestroy');
    Route::resource('bidangs', 'BidangController');

    // Seksis
    Route::delete('seksis/destroy', 'SeksiController@massDestroy')->name('seksis.massDestroy');
    Route::resource('seksis', 'SeksiController');

    // Lokasis
    Route::delete('lokasis/destroy', 'LokasiController@massDestroy')->name('lokasis.massDestroy');
    Route::resource('lokasis', 'LokasiController');

    // Jadwals
    Route::delete('jadwals/destroy', 'JadwalController@massDestroy')->name('jadwals.massDestroy');
    Route::resource('jadwals', 'JadwalController');

    // Petugas
    Route::delete('petugas/destroy', 'PetugasController@massDestroy')->name('petugas.massDestroy');
    Route::resource('petugas', 'PetugasController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
