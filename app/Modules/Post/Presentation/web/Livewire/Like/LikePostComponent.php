<?php

namespace App\Modules\Post\Presentation\web\Livewire\Like;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\Domain\Models\LikeForPost;
use App\Modules\Post\Domain\Services\LikeService;
use App\Modules\Post\App\Repositories\PostRepository;
use App\Modules\Post\App\Data\ValueObject\Like\LikeForPostVO;
use Illuminate\Database\Eloquent\Collection;

class LikePostComponent extends Component
{
    public ?Post $post;
    public ?LikeForPost $likeModel = null; // Новое свойство

    /**
    * Флаг, определяющий, должно ли быть отключено "сердечко".
    *
    * @var bool
    */
    public bool $disableHeartButton = false;


    /**
    * Дополнительные переданные классы в кнопку
    *
    * @var string
    */
    public string $buttonClass = '';

    /**
     * Количество лайков на пост
     * @var int
     */
    public int $likesCount = 0;

    protected $listeners = ['syncEdit' => 'updateSyncEdit'];

    public function updateSyncEdit(int $likesCount)
    {
        $this->likesCount = $likesCount;
    }


    public function mount(
        Post $post,
        PostRepository $postRepository,
        Request $request,
        ?Collection $collection
    ) {

        #TODO Нужно делать поиск заранее в blade, таким способом получается что на каждый компонент делается запрос в бд - нужно продумать по другому или потимизировать
        if(!is_null($this->post) && !is_null($collection)){

            $model = $postRepository->findLikeForCommentObject(
                $collection,
                LikeForPostVO::make(
                    post_id: $this->post->id,
                    user_id: Auth::user()->id ?? null,
                    user_agent: $request->header('User-Agent'),
                    ip: $request->ip(),
                )
            );

        }

        $this->likeModel = $model ?? null;

        $this->post = $post;
        $this->likesCount = $post->likes->where('status', true)->count();

    }



    public function setLike(
        Request $request,
        LikeService $service,
    ) {

        $vo = LikeForPostVO::make(
            post_id: $this->post->id,
            user_id: Auth::user()->id ?? null,
            user_agent: $request->header('User-Agent'),
            ip: $request->ip(),
        );

        $this->likeModel = $service->setLike($vo); // Сохраните модель в свойстве

        if($this->likeModel->status) {
            $this->likesCount++;
        } else {
            $this->likesCount--;
        }

        $this->dispatch('syncEdit', $this->likesCount);

    }

    public function render()
    {
        return view('livewire.post.like.like-post',[
            'likeModel' => $this->likeModel
        ]);
    }
}
