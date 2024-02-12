<?php

use App\Enums\StatusEnum;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('ticket_id')
                ->references('id')
                ->on('tickets')
                ->onDelete('cascade');

            $table->string('kode_booking')->nullable();
            $table->string('bank_asal')->nullable();
            $table->string('nama_pengirim')->nullable();
            $table->string('bukti_transfer')->nullable();
            $table->double('total')->nullable();
            $table->string('status')->default(StatusEnum::PROSES->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
