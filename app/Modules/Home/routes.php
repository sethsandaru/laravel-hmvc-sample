<?php
/**
 * Route for Home modules
 * Declare route normally like all other :D
 * For most case, your module name will be the parent path (Ex: /home/abc, /home/xxxx)
 */

$module_namespace = "App\Modules\Home\Controllers";

Route::prefix('/home')->namespace($module_namespace)->group(function () {
    Route::get('/index', "Home@index");
    Route::get('/view', "Home@view");
    Route::get('/test_insert_model', "Home@test_insert_model");
    Route::get('/get_model', "Home@get_model");
});