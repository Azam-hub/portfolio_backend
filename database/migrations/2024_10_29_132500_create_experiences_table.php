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
        Schema::create('experiences', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('order');
            $table->string('field');
            $table->string('year');
            $table->text('description');
            $table->integer('is_deleted')->default(0);
            $table->string('created_at', 80);
            $table->string('updated_at', 80);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
