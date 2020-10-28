<?php

Route::group(['middleware' => ['web', 'lookup:user', 'auth:user'], 'namespace' => 'Modules\Cabytrim\Http\Controllers'], function()
{
    Route::resource('cabytrim', 'CabytrimController');
    Route::post('cabytrim/filter', 'CabytrimController@filter')->name('filter');
});

Route::group(['middleware' => 'api', 'namespace' => 'Modules\Cabytrim\Http\ApiControllers', 'prefix' => 'api/v1'], function()
{
    Route::resource('cabytrim', 'CabytrimApiController');
});
