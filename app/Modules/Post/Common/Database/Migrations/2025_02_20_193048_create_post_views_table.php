<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('post_views', function (Blueprint $table) {

            $table->id();

            $table->foreignId('post_id')->constrained('posts');
            $table->string('user_agent');

            $table->unique(['unique', 'user_agent']);

            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('post_views');
    }
};
