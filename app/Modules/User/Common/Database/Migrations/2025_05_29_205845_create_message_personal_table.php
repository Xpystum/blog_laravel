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

            $table->foreignId('chat_personal_id')->comment('пользователь с кем создан чат')->index()
                ->constrained('chat_personal');

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
