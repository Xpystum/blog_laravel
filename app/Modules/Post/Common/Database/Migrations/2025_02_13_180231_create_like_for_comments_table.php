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
        Schema::create('like_for_comments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('post_id')->constrained('posts')->comment('Указываем к какому посту был поставлен лайкн');
            $table->foreignId('user_id')->nullable()->constrained('users')->comment('Указываем какой зарегистрированный пользователь поставил лайк');

            $table->string('user_agent');          // строка User Agent
            $table->string('ip');      // IP-адрес, сделаем поле nullable для анонимных пользователей

            $table->index('post_id');
            $table->index('ip');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like_for_comments');
    }
};
