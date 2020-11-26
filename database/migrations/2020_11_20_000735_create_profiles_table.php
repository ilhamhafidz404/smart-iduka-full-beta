<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned()->unique()
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('name')->nullable();
            $table->string('kota_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('jk')->nullable();
            $table->string('agama')->nullable();
            $table->string('status_nikah')->nullable();
            $table->string('tg_badan')->nullable();
            $table->string('brt_badan')->nullable();
            $table->string('no_hp',13)->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->text('alamat')->nullable();
            $table->text('pendidikan')->nullable();
            $table->text('penghargaan')->nullable();
            $table->text('pengalaman')->nullable();
            $table->text('keahlian')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
