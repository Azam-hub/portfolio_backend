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
        Schema::create('skills', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('order');
            $table->string('skill');
            $table->integer('percentage');
            $table->integer('is_deleted')->default(0);
            $table->string('created_at', 50);
            $table->string('updated_at', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
