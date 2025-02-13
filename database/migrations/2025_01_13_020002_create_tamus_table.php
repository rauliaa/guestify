<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tamus', function (Blueprint $table) {
            $table->id('id_tamu');
            $table->string('nama_tamu');
            $table->string('email_tamu')->unique();
            $table->string('nomor_telepon');
            $table->string('kode_unik')->unique()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tamus');
    }
};
