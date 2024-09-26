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
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropForeign(['subject_id']);

            // Now drop the subject_id column
            $table->dropColumn('subject_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id')->nullable();

            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });;
    }
};
