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
        Schema::create('configuration_part', function (Blueprint $table) {
            $table->unsignedBigInteger('configuration_id');
            $table->unsignedBigInteger('part_id');
            $table->timestamps();

            $table->foreign('configuration_id')->references('id')->on('configurations')->onDelete('cascade');
            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuration_part');
    }
};
