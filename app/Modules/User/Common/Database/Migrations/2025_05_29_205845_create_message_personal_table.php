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
        Schema::create('message_personal', function (Blueprint $table) {

            $table->id();

            $table->foreignId('chat_personal_id')->index()
                ->constrained('chat_personal');

            $table->foreignId('user_id')->index()
                ->constrained('users');

            $table->text('message')->comment('пользователь с кем создан чат');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_message_personal');
    }
};
