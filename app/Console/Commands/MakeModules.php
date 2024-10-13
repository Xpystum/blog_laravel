<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class MakeModules extends Command
{
    public const OUTFOLDER = ['App', 'Common', 'Domain' , 'Presentation'];

    //В папке App
    public const APPFOLDER = ['Data', 'Providers', 'Queues', 'Repositories'];

    //В папке Common
    public const COMMONFOLDER = ['Config', 'Database', 'Helpers', 'Requests', 'Tests'];

    //В папке Domain
    public const DOMAINFOLDER = ['Actions', 'Exceptions', 'Interactor', 'Interface', 'Models', 'Rule', 'Services'];

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
        $path = ("app/Modules/" . $nameModule);

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
                    break;
                }

                case 'Domain':
                {
                    $this->createInnerFolder($path, $folder, self::DOMAINFOLDER);

                    // Выполняет команду artisan make:model
                    Artisan::call('make:model', [
                        'name' => 'App\\Modules\\' . $nameModule . '\\' . 'Domain' . "\\" . 'Models' . '\\' . $nameModule,
                        '--migration' => true,
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

    private function createInnerFolder(string $path, string $folder, array $static)
    {
        $pathIn = $path . '/' . $folder;
        File::makeDirectory($pathIn);

        foreach ($static as $value) {
            File::makeDirectory($pathIn . '/' . $value , 0777, true);
        }
    }
}
