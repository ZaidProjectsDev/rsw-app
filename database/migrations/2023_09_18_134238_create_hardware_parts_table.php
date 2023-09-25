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
        Schema::create('hardware_parts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('hardware_type_id')->index();
            $table->unsignedBigInteger('vendor_id')->index();
            $table->foreign('hardware_type_id')->references('id')->on('hardware_types');
            $table->foreign('vendor_id')->references('id')->on('vendors');

            $table->timestamps();
        });


        //Foreign key link from users and games to create table foundation.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_parts');
    }
};
