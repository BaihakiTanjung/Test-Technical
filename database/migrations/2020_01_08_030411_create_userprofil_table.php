<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserprofilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprofil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('users_id');
            $table->string('nl', 45);
            $table->date('tgl');
            $table->enum('jk', ['Laki-Laki', 'Perempuan']);
            $table->enum('agama', ['Islam', 'Protestan', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya']);
            $table->string('email', 50);
            $table->integer('umur');
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
        Schema::dropIfExists('userprofil');
    }
}
