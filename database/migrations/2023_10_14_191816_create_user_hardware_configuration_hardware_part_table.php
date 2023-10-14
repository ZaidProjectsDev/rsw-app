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
        Schema::create('user_hardware_configuration_hardware_part', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_hardware_configuration_id');
            $table->unsignedBigInteger('hardware_part_id');

            $table->foreign('user_hardware_configuration_id')->references('id')->on('user_hardware_configurations')->onDelete('cascade');
            $table->foreign('hardware_part_id')->references('id')->on('hardware_parts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_hardware_configuration_hardware_part');
    }
};
