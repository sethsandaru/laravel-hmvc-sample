<?php

namespace App\Modules\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Home\Http\Requests\HomeRequest;

/**
 * Class Home
 * @package App\Modules\Home\Controllers
 *
 * Our basic controller, we should follow the Laravel API Resource
 *  - index (if API => list, if View Page => view)
 *  - show
 *  - add (no need if you're developing API Endpoint)
 *  - create
 *  - update
 *  - delete
 */
class Home extends Controller
{
    function index(HomeRequest $request) {

    }

    function show() {
    }
}
