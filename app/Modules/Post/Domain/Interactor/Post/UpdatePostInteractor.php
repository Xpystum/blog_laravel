<?php

namespace App\Modules\Post\Domain\Interactor\Post;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\App\Data\ValueObject\PostVO;
use App\Modules\Post\Domain\Models\PostImageCover;
use App\Modules\Post\App\Data\ValueObject\PostImageCoverVO;
use App\Modules\Post\App\DTO\UpdatePostDTO;
use App\Modules\StorageFile\Domain\Services\StorageFileService;
use App\Modules\Post\Domain\Actions\Post\CreatePostImageCoverAction;
use App\Modules\Post\Domain\Actions\Post\UpdatePostAction;

class UpdatePostInteractor
{

    private string $keyValueSetting; //Значение ключа из табицы setting для указания папки при сохранения файла
    private string $diskName; //Название диска сохранения

    public function __construct(
        private StorageFileService $storageFileService
    ) {

        $this->keyValueSetting = 'post_img_name_folder';
        $this->diskName = 'post_image_cover';

    }


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

            #TODO Возможно надо обновить состояние - могут быть проблемы
            /** @var Post */
            $post = $dto->post;


            if($dto->file) {

                /** @var array */
                $array = $this->storageFileService->saveFile($dto->file, $this->keyValueSetting, $this->diskName);

                /** @var UploadedFile */
                $saveFile = $array['file'];

                /** @var string */
                $path = $array['path'];

                if($saveFile && $path)
                {
                    $post->cover_img()->delete();
                }

                /** @var PostImageCover */
                $postImageCover = $this->createPostImageCover(
                    PostImageCoverVO::make(
                        post_id: $post->id,
                        path_url: $path,
                        original_name: $saveFile->getClientOriginalName(),
                        formed_name: $saveFile->getClientOriginalName(),
                        size: $saveFile->getSize(),
                        mime_type: $saveFile->getMimeType(),
                    )
                );

                $postImageCover = $post->cover_img()->save($postImageCover);

                // //сохраняем связь
                // $post->cover_img = $postImageCover;

            }

            return $status;

        });

        return $status;
    }

    public function updatePost(PostVO $vo, Post $post) : bool
    {
        return UpdatePostAction::make($vo, $post);
    }

    public function createPostImageCover(PostImageCoverVO $vo) : PostImageCover
    {
        return CreatePostImageCoverAction::make($vo);
    }
}
