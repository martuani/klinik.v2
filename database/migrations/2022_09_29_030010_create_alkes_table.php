<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlkesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alkes', function (Blueprint $table) {
            $table->id();
            $table->string('kod');
            $table->foreignId('golongan_alkes_id')->constrained();
            $table->foreignId('nama_alkes_id')->constrained();
            $table->foreignId('satuan_obat_id')->constrained();
            $table->foreignId('bobot_obat_id')->constrained();
            $table->text('komposisis')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('alkes');
    }
}
