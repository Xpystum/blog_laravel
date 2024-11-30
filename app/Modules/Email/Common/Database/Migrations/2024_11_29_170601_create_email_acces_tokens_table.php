<?php

use App\Modules\Email\App\Data\Enums\EmailStatusEnum;
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
        Schema::create('email_acces_tokens', function (Blueprint $table) {

            $table->id();

            $table->uuid('uuid');

            $table->string('value')->comment('Значение email');

            $table->string('status')->default(EmailStatusEnum::pending->value)->comment('Статус заявки');

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
        Schema::dropIfExists('email_acces_tokens');
    }
};
