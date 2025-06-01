<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->unsignedTinyInteger('type');
            $table->timestamps();
        });

        Schema::create('serial_category', function (Blueprint $table) {
            $table->foreignId('serial_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->primary(['serial_id', 'category_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
