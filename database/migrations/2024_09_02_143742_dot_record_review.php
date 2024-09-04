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
        
        Schema::create('dot_record_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dot_record_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('review');
            $table->integer('rating');
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dot_record_reviews');
    }
};
