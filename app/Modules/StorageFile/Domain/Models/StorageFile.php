<?php

namespace App\Modules\Tender\Domain\Services;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use function App\Helpers\uuid;

final class StorageFile
{
    /**
     * Сохраяем файл по указанным параметрам
     * @param UploadedFile $file - сохраняемый файл
     * @param string $nameDocument - название папки сохранения
     * @param string $disk - указание диска сохранения
     *
     * @return string возвращает путь к файлу
     */
    public function saveFile(UploadedFile $file, string $nameDocument = 'agreements', string $disk = 'tender_documents') : string
    {
        switch ($nameDocument) {

            case 'agreements':
            {
                return $this->saveStorageFile($file, $nameDocument, $disk);
                break;
            }
            case 'applications':
            {
                return $this->saveStorageFile($file, $nameDocument, $disk);
                break;
            }
            default:
            {

                $nameClass = self::class;

                try {
                    throw new Exception('Ошибка в классе: ' . $nameClass, 500);
                } catch (\Throwable $th) {
                    logError("Ошибка в {$nameClass} при выборе правильного storage в switch для сохранения файлов Tender : " . $th);
                }

                break;
            }
        }

    }


    private function saveStorageFile(UploadedFile $file, string $nameDocument, string $disk) : string
    {

        dd($disk);

        $originalName = $file->getClientOriginalName(); // Например, "document.pdf"

        //Получение Расширения Файла:
        $extension = $file->getClientOriginalExtension();

        // Извлечение имени файла без расширения
        $nameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);

        //создаём уканильное название для файла.
        $uniqueName = $nameWithoutExtension . '_' . uuid() . '.' . $extension;

        try {

            $status = $file->storeAs($nameDocument, $uniqueName , $disk);

            dd($status);

            if($status == false) { throw new Exception(); }

        } catch (\Throwable $th) {

            $nameClass = self::class;

            dd(1);

            logError("Ошибка в {$nameClass} при сохранения файла в storage: " . $th);
            throw new Exception('Ошибка в классе: ' . $nameClass, 500);

        }

        return $status;
    }

    /**
     * Проверяет существование файла на заданном диске.
     *
     * @param string $nameFile
     * @param string $disk
     * @return bool
     */
    private function fileExists(string $nameFile, string $disk = 'tender_documents'): bool
    {
        return Storage::disk($disk)->exists($nameFile);
    }

}
