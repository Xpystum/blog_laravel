<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    { //Таблица с картинкой обложки
        Schema::create('post_img_covers', function (Blueprint $table) {

            $table->id();

            $table->foreignId('post_id')->constrained('posts')->unique()->comment('Изображение которое принадлежит статье');
            $table->string('path_url')->comment('Путь к картинке');
            $table->string('original_name', 255)->comment('Оригинально название изображения');
            $table->string('formed_name', 255)->comment('Сформированное название картинки');
            $table->string('mime_type')->nullable();
            $table->integer('size', 255)->comment('Размер файла');
            $table->boolean('is_deleted')->default(false);

            $table->timestamps();

        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('post_img_cover');
    }
};
