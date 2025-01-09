<?php

namespace App\Modules\StorageFile\Domain\Services;

use App\Modules\Setting\Domain\Models\Setting;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Сервес для работы с файловой системой приложения пример: сохранения файлов, аватаров
 */
class StorageFileService
{
    /**
     * Сохраяем файл по указанным параметрам
     * @param UploadedFile $file - сохраняемый файл
     * @param string $nameKeyDocument - значение consts из Setting таблицы
     * @param string $disk - указание диска сохранения
     *
     * @return string возвращает путь к файлу
     */
    public function saveFile(UploadedFile $file, string $nameKeyDocument, string $disk) : string
    {

        //получаем из const таблицы значение папки для сохранения
        $nameDocument = Setting::get($nameKeyDocument); #TODO пересмотреть логику работы

        $this->saveStorageFile($file, $nameDocument, $disk); //сохраняем файл в папку по пути из config -> disk

    }


    private function saveStorageFile(UploadedFile $file, string $nameDocument, string $disk) : string
    {
        $originalName = $file->getClientOriginalName(); // Например, "document.pdf"

        //Получение Расширения Файла:
        $extension = $file->getClientOriginalExtension();

        // Извлечение имени файла без расширения
        $nameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);

        //создаём уканильное название для файла.
        $uniqueName = $nameWithoutExtension . '_' . uuid() . '.' . $extension;

        try {

            $status = $file->storeAs($nameDocument, $uniqueName , $disk);

            if($status == false) { throw new Exception(); }

        } catch (\Throwable $th) {

            $nameClass = self::class;

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
