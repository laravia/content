<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{

    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('body');
            $table->integer('user_id')->unsigned()->index();
            $table->dateTime('onlineFrom')->nullable();
            $table->dateTime('onlineTo')->nullable();
            $table->tinyInteger('active')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
