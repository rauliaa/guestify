<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id('id_kehadiran');
            $table->unsignedBigInteger('id_tamu'); // Pastikan unsignedBigInteger
            $table->foreign('id_tamu')->references('id_tamu')->on('tamus')->onDelete('cascade');
            $table->string('acara');
            $table->dateTime('waktu_kehadiran');
            $table->string('status_kehadiran');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kehadirans');
    }
};
