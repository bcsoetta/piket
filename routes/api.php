<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Bidangs
    Route::apiResource('bidangs', 'BidangApiController');

    // Seksis
    Route::apiResource('seksis', 'SeksiApiController');

    // Lokasis
    Route::apiResource('lokasis', 'LokasiApiController');

    // Jadwals
    Route::apiResource('jadwals', 'JadwalApiController');

    // Petugas
    Route::apiResource('petugas', 'PetugasApiController');
});
