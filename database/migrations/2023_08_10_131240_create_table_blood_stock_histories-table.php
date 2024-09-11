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
        Schema::create('blood_stock_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blood_stock_id');
            $table->string('gol_darah');
            $table->string('jenis');
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('blood_stock_id')->references('id')->on('blood_stocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
