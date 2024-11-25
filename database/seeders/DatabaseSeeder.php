<?php

namespace Database\Seeders;


use App\Modules\User\Domain\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //получем аватар
        {
            $files = Storage::disk('avatars')->files();

            if (!empty($files)) {

                $randomFile = $files[array_rand($files)]; // Случайный файл

                $absolutePath = Storage::disk('avatars')->path($randomFile);

            // Убираем корневую часть пути, полученную из `public_path()`
                $relativePath = str_replace(public_path() . '\\', '', $absolutePath);


            } else {
                dd('Папка пуста или не существует!');
            }

            User::factory()->create([
                'email' => 'test@gmail.com',
                'password' => Hash::make('password'),
                'url_avatar' => $relativePath,
            ]);
        }









    }
}
