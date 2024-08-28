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
        Schema::table('dot_record_properties', function (Blueprint $table) {
            $table->foreign('dot_record_id')->references('id')->on('dot_records')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dot_record_properties', function (Blueprint $table) {
            $table->dropForeign(['dot_record_id']);
        });
    }
};
