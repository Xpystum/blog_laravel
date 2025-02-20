<?php

namespace App\Modules\Post\Domain\Interactor\Post;

use App\Modules\Post\App\Data\ValueObject\Post\PostVO;
use Illuminate\Support\Facades\DB;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\App\DTO\UpdatePostDTO;
use App\Modules\Post\Domain\Actions\Post\UpdatePostAction;

use App\Modules\Post\Domain\Interactor\CreateAndSaveFileInteractor;
use Exception;

class UpdatePostInteractor
{

    public function __construct(
        private CreateAndSaveFileInteractor $createAndSaveFileInteractor,
    ) {}


    public function execute(UpdatePostDTO $dto) : bool
    {
        return $this->run($dto);
    }

    private function run(UpdatePostDTO $dto) : bool
    {

        /** @var bool */
        $status = DB::transaction(function () use ($dto) {

            /** @var bool */
            $status = $this->updatePost($dto->vo, $dto->post);

            // dd($dto->post);

            #TODO Возможно надо обновить состояние - могут быть проблемы
            /** @var Post */
            $post = $dto->post;

            if($dto->file !== null)
            {
                //запускаем логику интерактора для сохранения и создание файла
                if($this->createAndSaveFileInteractor->execute(file: $dto->file, post: $post) === false) {
                    logError("Ошибка сохранения и создание файла 'Обложка статьи' в UpdatePostInteractor");
                    throw new Exception('Ошибка на стороне сервера');
                };
            }

            return $status;

        });

        return $status;
    }

    public function updatePost(PostVO $vo, Post $post) : bool
    {
        return UpdatePostAction::make($vo, $post);
    }


}
