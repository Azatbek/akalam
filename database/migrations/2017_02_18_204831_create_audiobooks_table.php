<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudiobooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('audiobooks')) {
        Schema::create('audiobooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('readers');
            $table->string('file');
            $table->integer('hits')->default(0);
            $table->integer('category_id');
            $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('audiobooks');
    }
}
