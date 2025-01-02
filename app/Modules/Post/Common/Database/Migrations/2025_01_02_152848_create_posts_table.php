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
            $table->string('path_img_post', 150)->nullable()->comment('Путь к картинке - для заголовка статьи');
            $table->string('path_img_post', 150)->nullable()->comment('Путь к картинке - для заголовка статьи');

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
