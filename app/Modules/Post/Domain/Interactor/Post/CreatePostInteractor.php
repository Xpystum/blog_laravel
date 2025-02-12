<?php

namespace App\Modules\Post\Domain\Interactor;


use Illuminate\Support\Facades\DB;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\App\DTO\CreatePostDTO;
use App\Modules\Post\App\Data\ValueObject\PostVO;
use App\Modules\Post\App\Data\ValueObject\PostImageCoverVO;
use App\Modules\Post\Domain\Actions\CreatePostImageCoverAction as ActionsCreatePostImageCoverAction;
use App\Modules\Post\Domain\Actions\Post\CreatePostAction;
use App\Modules\Post\Domain\Actions\Post\CreatePostImageCoverAction;
use App\Modules\Post\Domain\Models\PostImageCover;
use App\Modules\StorageFile\Domain\Services\StorageFileService;
use Illuminate\Http\UploadedFile;

class CreatePostInteractor
{

    private string $keyValueSetting; //Значение ключа из табицы setting для указания папки при сохранения файла
    private string $diskName; //Название диска сохранения

    public function __construct(
        private StorageFileService $storageFileService
    ) {

        $this->keyValueSetting = 'post_img_name_folder';
        $this->diskName = 'post_image_cover';

    }


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

            if($dto->file) {

                /** @var array */
                $array = $this->storageFileService->saveFile($dto->file, $this->keyValueSetting, $this->diskName);

                /** @var UploadedFile */
                $saveFile = $array['file'];

                /** @var string */
                $path = $array['path'];

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

                //сохраняем связь
                $post->cover_img()->save($postImageCover);

            }

            return $post;
        });

        return $model;
    }

    public function createPost(PostVO $vo) : Post
    {
        return CreatePostAction::make($vo);
    }

    public function createPostImageCover(PostImageCoverVO $vo) : PostImageCover
    {
        return ActionsCreatePostImageCoverAction::make($vo);
    }
}
