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
    public function saveFile(UploadedFile $file, string $nameKey, string $disk) : array
    {

        //получаем из const таблицы значение папки для сохранения
        $nameDocument = Setting::get($nameKey); #TODO пересмотреть логику работы

        if(is_null($nameDocument)) {


            $nameClass = self::class;

            logError("Ошибка в {$nameClass} при сохранения файла в storage: не найден ключ из setting const таблицы");
            throw new Exception('Ошибка в классе: ' . $nameClass, 500);

        }

        return $this->saveStorageFile($file, $nameDocument, $disk); //сохраняем файл в папку по пути из config -> disk

    }


    private function saveStorageFile(UploadedFile $file, string $nameDocument, string $disk) : array
    {
        $originalName = $file->getClientOriginalName(); // Например, "document.pdf"

        //Получение Расширения Файла:
        $extension = $file->getClientOriginalExtension();

        // Извлечение имени файла без расширения
        $nameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);

        //создаём уканильное название для файла.
        $uniqueName = $nameWithoutExtension . '_' . uuid() . '.' . $extension;

        try {

            $path = $file->storeAs($nameDocument, $uniqueName , $disk);

            // Полный путь к сохраненному файлу
            $fullPath = Storage::disk($disk)->path($path);

            // Создаем объект UploadedFile для файла
            $savedFile = new UploadedFile(
                $fullPath,                   // Абсолютный путь к файлу
                basename($fullPath),         // Имя файла
                mime_content_type($fullPath), // MIME-тип файла (определяем вручную)
                null,                        // Код ошибки (null, т.к. файла ошибок уже нет)
                true                         // Установить как test-файл, чтобы избежать проблем с валидацией
            );


            if($savedFile == false) { throw new Exception(); }

        } catch (\Throwable $th) {

            $nameClass = self::class;

            logError("Ошибка в {$nameClass} при сохранения файла в storage: " . $th);
            throw new Exception('Ошибка в классе: ' . $nameClass, 500);

        }

        return $this->getArray($savedFile, $path);
    }

    private function getArray(UploadedFile $file, string $path) : array
    {
        return [
            'file' => $file,
            'path' => $path,
        ];
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
