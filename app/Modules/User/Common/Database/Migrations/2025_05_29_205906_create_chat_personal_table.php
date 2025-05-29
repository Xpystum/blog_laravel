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
        Schema::create('chat_personal', function (Blueprint $table) {

            $table->id();

            $table->foreignId('other_profile_id')->comment('пользователь с кем создан чат')->index()
                ->constrained('profiles');

            $table->foreignId('me_profile_id')->index()
                ->constrained('profiles');

            $table->unique(['send_user_id', 'accept_user_id']);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_chat_personal_create');
    }
};
