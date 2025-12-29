<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room', function (Blueprint $table) {
        $table->id();

        $table->foreignId('building_id')
            ->constrained('building')
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        $table->string('room_number', 10);
        $table->unsignedTinyInteger('beds_count');
        $table->decimal('price', 10, 2);

        $table->unique(['building_id', 'room_number']);
        $table->index('building_id');
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('room');
    }
};
