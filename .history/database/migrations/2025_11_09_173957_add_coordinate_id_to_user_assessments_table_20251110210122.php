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
        Schema::table('user_assessments', function (Blueprint $table) {
            $table->json('answers')->nullable()->after('status');
            $table->integer('total_score')->nullable()->after('answers');
            $table->integer('max_score')->nullable()->after('total_score');
            $table->string('risk_level')->nullable()->after('max_score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_assessments', function (Blueprint $table) {
            $table->dropColumn(['answers', 'total_score', 'max_score', 'risk_level']);
        });
    }
};
