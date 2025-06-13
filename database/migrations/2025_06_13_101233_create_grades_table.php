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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('course_id');
            $table->decimal('aktifitas_partisipatif', 5, 2)->default(0.00);
            $table->decimal('hasil_proyek', 5, 2)->default(0.00);
            $table->decimal('quiz', 5, 2)->default(0.00);
            $table->decimal('tugas', 5, 2)->default(0.00);
            $table->decimal('uts', 5, 2)->default(0.00);
            $table->decimal('uas', 5, 2)->default(0.00);
            $table->decimal('rata_rata', 5, 2)->default(0.00);
            $table->string('hasil_akhir', 2)->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};