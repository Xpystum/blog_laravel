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
        Schema::create('posts', function (Blueprint $table) {

            $table->id();

            $table->string('title', 150)->comment('Заголовок статьи');
            $table->text('content')->comment('Контент статьи содержащий html разметку');
            $table->text('content_cover')->comment('Очищенный текст от html для обложки статьи');

            $table->foreignId('user_id')->constrained('users');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
