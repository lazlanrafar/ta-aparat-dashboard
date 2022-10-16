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
        Schema::create('notulens', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->date('tgl_notulen');
            $table->string('agenda');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->string('tempat');
            $table->text('isi_notulen');
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
        Schema::dropIfExists('notulens');
    }
};
