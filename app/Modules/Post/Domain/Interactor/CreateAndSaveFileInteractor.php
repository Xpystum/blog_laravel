<?php

namespace App\Modules\Post\Domain\Interactor;

use App\Modules\Post\App\Data\ValueObject\Post\PostImageCoverVO;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\Domain\Actions\Post\CreatePostImageCoverAction;
use App\Modules\Post\Domain\Models\PostImageCover;
use App\Modules\StorageFile\Domain\Services\StorageFileService;


class CreateAndSaveFileInteractor
{
    private string $keyValueSetting; //Значение ключа из табицы setting для указания папки при сохранения файла
    private string $diskName; //Название диска сохранения

    public function __construct(
        private StorageFileService $storageFileService
    ) {
        $this->keyValueSetting = 'post_img_name_folder';
        $this->diskName = 'post_image_cover';
    }


    public function execute(UploadedFile $file, Post $post) : bool
    {
        return $this->run($file, $post);
    }

    private function run(UploadedFile $file, Post $post) : bool
    {
        if($file) {

            /** @var bool */
            $status = DB::transaction(function () use ($file, $post) {

                /** @var array */
                $array = $this->storageFileService->saveFile($file, $this->keyValueSetting, $this->diskName);

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

                return $postImageCover = (bool) $post->cover_img()->save($postImageCover);

            });

            return $status;

        }

        return false;
    }

    public function createPostImageCover(PostImageCoverVO $vo) : PostImageCover
    {
        return CreatePostImageCoverAction::make($vo);
    }

}
