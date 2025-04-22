<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {

            $table->id();

            $table->json('project_json');
            $table->foreignId('profile_id')->index()
                ->constrained('profiles');


            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
