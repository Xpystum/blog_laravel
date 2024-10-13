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
        Schema::create('post_img', function (Blueprint $table) {
            $table->id();

            $table->string('pathImg', '100')->comment('Путь изображения');
            $table->string('alt', '250')->nullable()->comment('Описание изображения');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_img');
    }
};
