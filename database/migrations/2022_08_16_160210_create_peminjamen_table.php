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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_ruangan');
            $table->date('tgl_booking');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->integer('jumlah_peserta');
            $table->string('agenda');
            $table->string('status');
            $table->string('status_approv1');
            $table->string('status_approv2');
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
        Schema::dropIfExists('peminjamen');
    }
};
