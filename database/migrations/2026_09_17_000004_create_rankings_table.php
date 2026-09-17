<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->date('period_month');
            $table->decimal('total_score', 10, 2)->default(0);
            $table->unsignedInteger('rank_position');
            $table->timestamps();

            $table->unique(['user_id', 'period_month']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rankings');
    }
};
