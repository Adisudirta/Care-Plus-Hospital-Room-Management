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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('namaKamar')->unique();
            $table->integer('kapasitasMaximum');
            $table->enum('urgensi', ['icu', 'sicu', 'hdu', 'nicu', 'ccu', 'pacu']);
            $table->enum('kelas', ['kelas1', 'kelas2', 'kelas3']);
            $table->enum('status', ['penuh', 'dapatDiisi'])->default('dapatDiisi');
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
        Schema::dropIfExists('rooms');
    }
};