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
        Schema::create('highloads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('url', 255)->index('highload_url_index');
            $table->integer('quantity')->unsigned();
            $table->json('request_json');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('highloads');
    }
};
