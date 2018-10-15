<?php
/**
 * Route for Home modules
 * Declare route normally like all other :D
 * For most case, your module name will be the parent path (Ex: /home/abc, /home/xxxx)
 */

Route::get('/home/index', "App\Modules\Home\Controllers\Home@index");
Route::get('/home/view', "App\Modules\Home\Controllers\Home@view");
Route::get('/home/test_insert_model', "App\Modules\Home\Controllers\Home@test_insert_model");
Route::get('/home/get_model', "App\Modules\Home\Controllers\Home@get_model");