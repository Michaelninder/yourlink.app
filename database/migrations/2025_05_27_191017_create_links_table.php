<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('links', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->uuid('user_id')->nullable(); // nullable for guest links
            $table->string('original_url');
            $table->string('short_code')->unique(); // short-uuid or UUID or custom slug
            $table->boolean('is_custom')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
