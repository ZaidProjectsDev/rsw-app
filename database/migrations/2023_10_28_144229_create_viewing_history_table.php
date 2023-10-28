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
        Schema::create('viewing_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('viewed_model'); // E.g., 'game', 'configuration', 'submission', 'part'
            $table->unsignedBigInteger('viewed_id');
            $table->timestamp('viewed_at')->useCurrent();

            $table->foreign('user_id')->references('id')->on('users');
            // Add foreign keys for other related models as needed

            // Add any other columns you require
            // ...

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viewing_history');
    }
};
