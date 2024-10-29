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
        Schema::create('general_infos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('profile_pic', 300);
            $table->string('email');
            $table->string('phone_no', 50);
            $table->string('whatsapp_no', 50);
            $table->string('location', 200);
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('github');
            $table->string('linkedin');
            $table->string('created_at', 50);
            $table->string('updated_at', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_infos');
    }
};
