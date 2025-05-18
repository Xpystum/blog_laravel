<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('check_skills', function (Blueprint $table) {

            $table->id();

            $table->string('name')->index();
            $table->boolean('status')->comment('Указан ли это скилл или нет');
            $table->foreignId('profile_id')->index()
                ->constrained('profiles');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('check_skills');
    }
};
