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
        Schema::create('checklist_masalah_questions', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->integer('category'); // 1=Fisik, 2=Emosi, 3=Mental, 4=Perilaku, 5=Spiritual
            $table->string('category_name');
            $table->integer('order_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklist_masalah_questions');
    }
};
