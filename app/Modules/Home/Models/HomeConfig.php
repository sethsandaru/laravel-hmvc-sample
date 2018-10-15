<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 10/15/2018
 * Time: 8:48 PM
 */

namespace App\Modules\Home\Models;


use Illuminate\Database\Eloquent\Model;

class HomeConfig extends Model
{
    protected $table = "HomeConfig";
    protected $primaryKey = "ID";
    public $timestamps = false;
    public static $snakeAttributes = false;
}