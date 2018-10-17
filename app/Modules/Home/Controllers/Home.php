<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 10/15/2018
 * Time: 7:58 PM
 */

namespace App\Modules\Home\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Home\Libraries\HomeLibrary;
use App\Modules\Home\Models\HomeConfig;
use Illuminate\Support\Facades\App;

class Home extends Controller
{
    function index() {
        //App::setLocale('vi'); test locate
        echo "Text Config: " . config('homeconfig.text') . " <br />"; // ok
        echo "Text Language: " . trans('Home::home.hello') . " <br />"; // ok

        (new HomeLibrary())->test(); // test lib

        return "OK! Modules are working now";
    }

    function view() {
        return view('Home::home.test_view', ['text' => trans('Home::home.hello')]);
    }

    function test_insert_model() {
        $config = new HomeConfig;
        $config->Key = "SiteName" . rand(0,999999); // just a simple way to prevent dup @@ (Key is unique)
        $config->Value = "SethPhat";
        $config->Meta = "{}";
        $config->save();

        return "Inserted ID: " . $config->ID;
    }

    function get_model() {
        dd(HomeConfig::all()->toArray());
    }
}