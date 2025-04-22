<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {

            $table->id();

            $table->string('full_name')->nullable()->comment('Полное имя');
            $table->string('url_avatar')->comment('ссылка на автара');
            $table->string('type')->comment('Кем является пользователь: Разработчик/Дизайнер/Другое');
            $table->foreignId('user_id')->index()
                ->constrained('users');


            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
