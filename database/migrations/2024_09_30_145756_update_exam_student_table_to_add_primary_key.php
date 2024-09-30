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
        Schema::table('exam_student', function (Blueprint $table) {
            // Drop the existing primary key (if there's one)
            $table->dropColumn('id');

            // Add composite primary key on `exam_id` and `student_id`
            $table->primary(['exam_id', 'student_id']);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_student', function (Blueprint $table) {
            //
        });
    }
};
