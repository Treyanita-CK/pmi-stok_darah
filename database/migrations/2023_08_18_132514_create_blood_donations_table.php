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
        Schema::create('blood_donations', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('ketersediaan');
            $table->string('bb');
            $table->string('gol_darah');
            $table->string('rhesus');
            $table->string('reaksi_donor');
            $table->string('donor_terakhir');
            $table->string('donor_ke');
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
        Schema::dropIfExists('blood_donations');
    }
};
