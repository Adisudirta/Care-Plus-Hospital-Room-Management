<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->nullable()->references('id')->on('rooms')->onDelete('cascade');
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('dokter');
            $table->string('noRekMedis')->unique();
            $table->enum('pembayaran', ['BPJS', 'Asuransi', 'Umum']);
            $table->integer('durasi');
            $table->timestamp('checkIn')->nullable();
            $table->timestamp('checkOut')->nullable();
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
        Schema::dropIfExists('patients');
    }
};