<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Bus
    Route::apiResource('buses', 'BusesApiController');

    // Rides
    Route::apiResource('rides', 'RidesApiController');

    // Bookings
    Route::apiResource('bookings', 'BookingsApiController');
});
