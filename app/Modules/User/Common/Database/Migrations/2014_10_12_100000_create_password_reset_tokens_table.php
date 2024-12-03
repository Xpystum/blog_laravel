<?php

use App\Modules\Email\App\Data\Enums\PasswordResetStatus;
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
        //миграция для сброса пароля
        Schema::create('password_resets', function (Blueprint $table) {

            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('value_email')->comment('Значение email');
            $table->string('status')->default(PasswordResetStatus::pending->value)->comment('Статус заявки');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamp('expires_at')->default(now()->addMinutes(15));
            $table->timestamps();
            $table->timestamp('created_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
