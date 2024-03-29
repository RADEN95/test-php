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
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')
                ->nullable()
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreignUuid('schedule_id')
                ->nullable()
                ->references('id')
                ->on('schedules')
                ->onDelete('cascade');

            $table->foreignUuid('discount_id')
                ->nullable()
                ->references('id')
                ->on('discounts')
                ->onDelete('cascade');

            $table->string('status')->default(StatusEnum::PROSES->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
