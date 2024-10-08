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
        Schema::table('timetables', function (Blueprint $table) {

            $table->dropForeign(['class_id']);
            $table->dropForeign(['subject_id']);
            if (!Schema::hasColumn('timetables', 'class_id')) {
                // This assumes you might have to add the column if it doesn't exist
                $table->unsignedBigInteger('class_id')->nullable();
            }

            if (!Schema::hasColumn('timetables', 'subject_id')) {
                // This assumes you might have to add the column if it doesn't exist
                $table->unsignedBigInteger('subject_id')->nullable();
            }

            // Add the foreign key with cascade on delete
            $table->foreign('class_id')
                ->references('id')
                ->on('classes')
                ->onDelete('cascade');

            $table->foreign('subject_id')
                ->references('id')
                ->on('subjects')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('timetables', function (Blueprint $table) {
            //
        });
    }
};
