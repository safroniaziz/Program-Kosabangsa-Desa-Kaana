<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); // "PCL-5", "DASS-21"
            $table->enum('type', ['pcl5', 'dass21', 'career', 'personality']);
            $table->integer('total_questions'); // 20, 21
            $table->integer('time_limit_minutes')->default(15);
            $table->text('instructions')->nullable();
            $table->text('disclaimer_text')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
