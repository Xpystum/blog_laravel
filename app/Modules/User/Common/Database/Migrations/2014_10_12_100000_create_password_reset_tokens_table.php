<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Modules\User\App\Data\Enums\PasswordResetStatusEnum;

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
            $table->string('status')->default(PasswordResetStatusEnum::pending->value)->comment('Статус заявки');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamp('expires_at')->default(now()->addMinutes(15));
            $table->timestamps();

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
