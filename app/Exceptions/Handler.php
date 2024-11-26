<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (Throwable $exception) {

            // Проверяем, если это ошибка 500
            if ($exception instanceof Exception && $exception->getCode() === 500) {

                $error = 'Произошла непредвиденная ошибка. Мы уже разбираемся с этим. Напишите поддержке для быстрой решении проблемы.';

                // Перенаправляем пользователя назад с ошибками и данными
                return redirect()->back()
                    ->withInput() // Возвращает предыдущие данные (если форма есть)
                    ->withErrors([
                        'error' => $error, // Кастомное сообщение для пользователей
                    ])
                    ->with('alert_error', [
                        'code' => 500,
                        'exception_message' => $error, // Сообщение из исключения (для отладки)
                        'timestamp' => now(), // Время ошибки
                    ]);
            }

        });
    }


}
