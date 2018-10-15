<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 10/15/2018
 * Time: 8:49 PM
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HomeConfig', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Key')->unique();
            $table->text('Value');
            $table->string('Meta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('HomeConfig');
    }
}