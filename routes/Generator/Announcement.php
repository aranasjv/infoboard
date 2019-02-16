<?php
/**
 * Announcement
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Announcement'], function () {
        Route::resource('announcements', 'AnnouncementsController');
        //For Datatable
        Route::post('announcements/get', 'AnnouncementsTableController')->name('announcements.get');
    });
    
});