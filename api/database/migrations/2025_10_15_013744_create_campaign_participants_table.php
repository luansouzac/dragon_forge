<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaign_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('campaign_id')->constrained('campaigns')->onDelete('cascade');
            $table->timestamps(); 

            $table->unique(['user_id', 'campaign_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campaign_participants');
    }
};