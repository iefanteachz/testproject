<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable(); // User who triggered the action
            $table->string('action'); // Action taken
            $table->text('details')->nullable(); // Additional details
            $table->json('before')->nullable(); // State before update
            $table->json('after')->nullable();  // State after update
            $table->ipAddress('ip_address')->nullable(); // IP Address
            $table->timestamps(); // Created at, updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
