<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')
    ->namespace('\App\Http\Controllers\Api\V1')
    ->group(
        function () {
            Route::apiResources(
                [
                    'lookup' => 'LookupController',
                    'user' => 'UserController',
                    'role' => 'RoleController',
                    'permission' => 'PermissionController'
                ]
            );
        }
    );

Route::prefix('v2')
    ->namespace('\App\Http\Controllers\Api\V2')
    ->group(
        function () {
            Route::apiResources(
                [
                    'demo' => 'DemoController'
                ]
            );
        }
    );
