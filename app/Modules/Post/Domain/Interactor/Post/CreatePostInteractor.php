<?php

namespace App\Modules\Post\Domain\Interactor\Post;

use App\Modules\Post\App\Data\ValueObject\Post\PostVO;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\App\DTO\CreatePostDTO;
use App\Modules\Post\Domain\Actions\Post\CreatePostAction;
use App\Modules\Post\Domain\Interactor\CreateAndSaveFileInteractor;

class CreatePostInteractor
{


    public function __construct(
        private CreateAndSaveFileInteractor $createAndSaveFileInteractor,
    ) {}


    public function execute(CreatePostDTO $dto) : Post
    {
        return $this->run($dto);
    }

    private function run(CreatePostDTO $dto) : Post
    {

        /** @var Post */
        $model = DB::transaction(function () use ($dto) {

            /** @var Post */
            $post = $this->createPost($dto->vo);

            //запускаем логику интерактора для сохранения и создание файла
            if($dto->file !== null)
            {
                dd(1);
                if($this->createAndSaveFileInteractor->execute(file: $dto->file, post: $post) === false) {
                    logError("Ошибка сохранения и создание файла 'Обложка статьи' в CreatePostInteractor");
                    throw new Exception('Ошибка на стороне сервера');
                };
            }

            return $post;
        });

        return $model;
    }

    public function createPost(PostVO $vo) : Post
    {
        return CreatePostAction::make($vo);
    }

}
