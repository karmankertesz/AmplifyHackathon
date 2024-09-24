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
        Schema::create('matters', function (Blueprint $table) {
            $table->id();
            $table->string('matter_id');
            $table->string('client_name');
            $table->string('title');
            $table->string('service');
            $table->string('type_of_law');
            $table->text('description');
            $table->string('industry');
            $table->integer('budget');
            $table->boolean('in_favour');
            $table->date('closure_date');
            $table->timestamps();

            $table->foreignId('lawyer_id')->references('id')->on('lawyers');
        });

        Schema::create('matter_embeddings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matter_id')->references('id')->on('matters');
            $table->json('context_embedding')->nullable();
            $table->json('lawyer_embedding')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matters');
    }
};
