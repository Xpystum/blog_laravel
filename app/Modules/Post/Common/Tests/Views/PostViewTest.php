<?php

namespace Tests\Feature;

use App\Modules\Post\Domain\Models\Comment;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\User\Domain\Models\User;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class PostViewTest extends TestCase
{


    /**
     * Проверка странички просмотре стать на рендеринг
     * @return void
     */
    public function test_view_post_can_be_render() : void
    {
        /** @var User */
        $user = User::factory()->create();

        //активируем user для view
        $this->actingAs($user);

        $post = Post::factory()
            ->has(Comment::factory()->count(6), 'comments')
            ->create();



        $view = $this->view('pages.user.post.preview',  compact('post'));

        $view->assertSeeTextInOrder([
            $post->title,
            $post->body,
        ]);

    }

}
