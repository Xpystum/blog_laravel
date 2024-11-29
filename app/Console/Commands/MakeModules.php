<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Str;

class MakeModules extends Command
{
    public const OUTFOLDER = ['App', 'Common', 'Domain' , 'Presentation'];

    //В папке App
    public const APPFOLDER = ['Data', 'Providers', 'Queues', 'Repositories'];

    //В папке Common
    public const COMMONFOLDER = ['Config', 'Database', 'Helpers', 'Requests', 'Tests'];

    //В папке Domain
    public const DOMAINFOLDER = ['Actions', 'Exceptions', 'Interactor', 'Interface', 'Models', 'Rule', 'Services', 'Factories'];

    //В папке Common
    public const PRESINTATIONFOLDER = ['CLI', 'API', 'HTTP'];

    protected $signature = 'make:module';

    protected $description = 'Создание структуры папок Модуля (Module)';

    public function handle()
    {

        $nameModule = $this->ask("Установите название Модуля:");

        $this->createModule($nameModule);

        $this->info('Модуль успешно создан.');
    }

    public function createModule(string $nameModule)
    {
        $path = ("App\\Modules\\" . $nameModule);

        File::makeDirectory($path, 0777, true);

        foreach(self::OUTFOLDER as $folder){

            switch ($folder) {
                case 'App':
                {
                    $this->createInnerFolder($path, $folder, self::APPFOLDER);
                    break;
                }

                case 'Common':
                {
                    $this->createInnerFolder($path, $folder, self::COMMONFOLDER);
                    $this->createMigration($path, $folder, $nameModule);

                    break;
                }

                case 'Domain':
                {
                    $this->createInnerFolder($path, $folder, self::DOMAINFOLDER);

                    // Выполняет команду artisan make:model
                    Artisan::call('make:model', [
                        'name' => 'App\\Modules\\' . $nameModule . '\\' . 'Domain' . "\\" . 'Models' . '\\' . $nameModule,
                        // '--migration' => true,
                    ]);

                    break;

                }

                case 'Presentation':
                {
                    $this->createInnerFolder($path, $folder, self::PRESINTATIONFOLDER);
                    break;
                }

                default:
                {
                    $this->warn('Ошибка в работе команды.'); // выводит предупреждение.
                    throw new Exception('Ошибка' , 500);
                    break;
                }
            }
        }


    }

    /**
     * Создание миграции в папке \\Database\\Migrations
     * @param string $path
     * @param string $folder
     * @param string $nameModule
     *
     * @return [type]
     */
    private function createMigration(string $path, string $folder, string $nameModule)
    {

        $timestamp = date('Y_m_d_His', time());
        $migrationPath = $path . '\\' . $folder . '\\Database' . '\\Migrations';
        $migrationName = 'create_' . Str::snake(Str::plural($nameModule)) . '_table';

        Artisan::call('make:migration', [
            'name' => $migrationName,
            '--path' => $migrationPath,
        ]);

    }

    private function createInnerFolder(string $path, string $folder, array $static)
    {
        $pathIn = $path . '/' . $folder;
        File::makeDirectory($pathIn);

        foreach ($static as $value) {
            File::makeDirectory($pathIn . '/' . $value , 0777, true);
            if($value == "Database") {
                File::makeDirectory($pathIn . '/' . $value . '/Migrations' , 0777, true);
            }
        }
    }
}
