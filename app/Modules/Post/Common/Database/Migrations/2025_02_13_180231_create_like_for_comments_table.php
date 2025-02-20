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
        Schema::create('like_for_posts', function (Blueprint $table) {

            $table->id();

            $table->foreignId('post_id')->constrained('posts')->comment('Указываем к какому посту был поставлен лайкн');
            $table->foreignId('user_id')->nullable()->constrained('users')->comment('Указываем какой зарегистрированный пользователь поставил лайк');

            $table->string('user_agent');
            $table->ipAddress('ip');

            $table->boolean('status')->default(true)->comment('Активирован ли лайк или нет');

            $table->index('user_agent');
            $table->index('ip');

            $table->unique(['post_id', 'user_id']);

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
