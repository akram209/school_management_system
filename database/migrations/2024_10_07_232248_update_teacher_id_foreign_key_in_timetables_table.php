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

            $table->dropForeign(['teacher_id']);
            if (!Schema::hasColumn('timetables', 'teacher_id')) {
                // This assumes you might have to add the column if it doesn't exist
                $table->unsignedBigInteger('teacher_id')->nullable();
            }

            // Add the foreign key with cascade on delete
            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
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
