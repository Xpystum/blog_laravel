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
        Schema::create('posts', function (Blueprint $table) {

            $table->id()->from(1001);

            $table->timestamps();

            // один из вариантов
            // $table->unsignedBigInteger('user_id')->nullable();

            // //если user удалится, устанавить в post -> user в null
            // $table->foreign('user_id')->references('id')->on('user')->onDelete('set null');


            $table->foreignId('user_id')->constrained('users');


            
            $table->string('title');

            $table->text('content');
            


            $table->boolean('published')->default(true);

            $table->timestamp('publisher_at')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
