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
        Schema::create('lawyers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('service');
            $table->string('type_of_law');
            $table->integer('total_cases'); // Civil
            $table->decimal('winning_rate'); // 0, 0.4, 1
        });

        Schema::create('lawyer_matter', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lawyer_id')->references('id')->on('lawyers');
            $table->string('matter_ids');
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyers');
    }
};
