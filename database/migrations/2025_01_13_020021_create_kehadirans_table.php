<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id('id_kehadiran');
            $table->unsignedBigInteger('id_tamu');
            $table->foreign('id_tamu')->references('id')->on('tamus')->onDelete('cascade');
            $table->string('acara');
            $table->dateTime('waktu_kehadiran');
            $table->enum('status_kehadiran', ['hadir', 'tidak hadir', 'pending']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kehadirans');
    }
};
