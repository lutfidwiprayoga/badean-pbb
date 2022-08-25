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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('nop_id');
            $table->string('nama_wp');
            $table->string('alamat_wp');
            $table->string('tahun');
            $table->string('pbb')->nullable();
            $table->string('denda')->nullable();
            $table->string('kekurangan')->nullable();
            $table->date('jatuh_tempo')->nullable();
            $table->string('status_bayar')->nullable();
            $table->string('kode_bayar')->nullable();
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
