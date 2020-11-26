<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostLokerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_loker', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('kategori_id');
            $table->string('title');
            $table->string('sbg');
            $table->string('lokasi');
            $table->string('kualifikasi');
            $table->string('min_gaji');
            $table->string('max_gaji');
            $table->text('deskripsi');
            $table->string('status');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_loker');
    }
}
