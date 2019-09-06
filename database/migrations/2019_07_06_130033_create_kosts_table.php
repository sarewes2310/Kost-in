<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kosts', function (Blueprint $table) {
            $table->bigIncrements('kosts_id');
            $table->bigInteger('sk_id');
            $table->bigInteger('lokasi_id');
            $table->bigInteger('users_id');
            $table->bigInteger('foto_kosts_id');
            $table->string('name');
            $table->text('alamat');
            $table->string('fasilitas');
            $table->integer('total_kamar');
            $table->integer('kamar_terisi');
            $table->Integer('harga');
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
        Schema::dropIfExists('kosts');
    }
}
