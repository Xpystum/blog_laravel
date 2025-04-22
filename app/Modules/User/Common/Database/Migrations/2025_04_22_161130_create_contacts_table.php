<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up(): void
    {
        //таблица контактов - например telegram, instagram, github
        Schema::create('contacts', function (Blueprint $table) {

            $table->id();

            $table->string('name')->index();
            $table->string('url');
            $table->foreignId('profile_id')->index()
                ->constrained('profiles');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
