<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stay', function (Blueprint $table) {
        $table->id();

        $table->foreignId('room_id')
            ->constrained('room')
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        $table->foreignId('guest_id')
            ->constrained('guest')
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        $table->date('date_start');
        $table->date('date_end');
        $table->unsignedTinyInteger('people_count');

        $table->index(['date_start', 'date_end']);
        $table->index('room_id');
        $table->index('guest_id');
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('stay');
    }
};
