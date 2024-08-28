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
        Schema::table('dot_records', function (Blueprint $table) {
            $table->foreign('source_id')->references('id')->on('dot_record_sources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dot_records', function (Blueprint $table) {
            $table->dropForeign(['source_id']);
        });
    }
};
