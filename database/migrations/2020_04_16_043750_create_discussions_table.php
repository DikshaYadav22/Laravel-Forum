<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionsTable extends Migration
{
    
    public function up()
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->text('content');
            $table->string('slug');
            $table->integer('channel_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('discussions');
    }
}
