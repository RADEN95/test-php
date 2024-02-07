<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('bus_id')
                ->references('id')
                ->on('buses')
                ->onDelete('cascade');

            $table->string('kapasitas');

            $table->string('kota_asal');
            $table->string('terminal_kota_asal');

            $table->string('kota_tujuan');
            $table->string('terminal_kota_tujuan');

            $table->dateTime('keberangkatan');
            $table->dateTime('kedatangan');
            $table->double('tarif');
            $table->timestamps();

            $table->foreign('kota_asal')
                ->references('id')
                ->on('regencies')
                ->onDelete('cascade');

            $table->foreign('kota_tujuan')
                ->references('id')
                ->on('regencies')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
