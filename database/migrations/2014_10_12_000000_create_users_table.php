<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->integer('nip')->unique();
            $table->integer('status');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::unprepared("CREATE PROCEDURE insertUser(name varchar(50), email varchar(50), password varchar(100), nip varchar(10), status int)
        BEGIN
            INSERT INTO users (name, email, password, nip, status)VALUES(name, email, password, nip, status);
        END;"
        );
        DB::unprepared("CREATE PROCEDURE getUserbyId(IN idx int)
        BEGIN
        SELECT * FROM users WHERE id =idx;
        END;
        ");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        DB::unprepared('DROP PROCEDURE IF EXISTS insertUser');
        DB::unprepared('DROP PROCEDURE IF EXISTS getUser');
    }
}
