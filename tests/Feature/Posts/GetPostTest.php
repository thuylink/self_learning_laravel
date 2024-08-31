<?php

namespace Tests\Feature\Posts;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class GetPostTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    #[Test]
    public function user_can_get_post_if_post_exists()
    {
        $post = Post::factory()->create();
        $response = $this->getJson(route('posts.show', $post->id));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson(
            fn(AssertableJson $json) =>
            $json->has(
                'data',
                fn(AssertableJson $json) =>
                $json->has('name')->etc()
            )
                ->has('message')
        );
    }

    #[Test]

    public function user_can_not_get_post_if_post_not_exists() {
        $postId = -1;
        $response = $this->getJson(route('posts.show', $postId));
        $response->assertStatus(Response::HTTP_NOT_FOUND);

    }
}
