<?php
/**
 * Event
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Event'], function () {
        Route::resource('events', 'EventsController');
        //For Datatable
        Route::post('events/get', 'EventsTableController')->name('events.get');
    });
    
});