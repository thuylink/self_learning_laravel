<?php

namespace Tests\Feature\Posts;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class DeletePostTest extends TestCase
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

    public function user_can_not_delete_post_not_exists_if_data_is_valid()
    {
        $response = $this->deleteJson(route('posts.destroy', -1));
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
    #[Test]
    public function user_can_delete_post_if_post_exists()
    {
        $post = Post::factory()->create();

        $response = $this->deleteJson(route('posts.destroy', $post->id));
        $response->assertStatus(Response::HTTP_OK);

    }
}
