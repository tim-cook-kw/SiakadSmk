<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Infosekolah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infosekolah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('web');
            $table->string('email');
            $table->string('nama_kepsek');
            $table->string('nip_kepsek');
            $table->string('logo');
            $table->string('visi');
            $table->string('misi');
            $table->string('alamat');
            $table->string('no_telepon');
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
        //
    }
}
