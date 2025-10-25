<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_assessment_id')->constrained()->onDelete('cascade');
            $table->integer('question_number'); // 1,2,3...20 for PCL-5 or 1,2,3...21 for DASS-21
            $table->integer('answer_value'); // 0,1,2,3,4 for PCL-5 or 0,1,2,3 for DASS-21
            $table->integer('response_time_ms')->nullable(); // response time in milliseconds
            $table->timestamp('answered_at');
            $table->timestamps();

            // Index for faster queries
            $table->index(['user_assessment_id', 'question_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_answers');
    }
};
