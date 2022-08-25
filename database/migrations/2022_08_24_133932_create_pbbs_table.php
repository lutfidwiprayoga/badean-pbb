<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbbs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('user_id');
            $table->string('tahun');
            $table->string('pbb');
            $table->string('denda');
            $table->string('kekurangan');
            $table->string('status_bayar');
            $table->string('kode_bayar');
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
        Schema::dropIfExists('pbbs');
    }
};
