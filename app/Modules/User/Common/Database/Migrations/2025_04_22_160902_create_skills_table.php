<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {

            $table->id();

            $table->string('name')->unique();
            $table->unsignedTinyInteger('percent')->default(0)->comment('процентр скилла от 0 до 100');
            $table->foreignId('profile_id')->index()
                ->constrained('profiles');

            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
