<?php

namespace Tests\Feature\Posts;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class UpdatePostTest extends TestCase
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
    public function user_can_update_post_if_post_exists()
    {
        $post = Post::factory()->create();
        $dataUpdate = [
            'name' => $this->faker->name,
            'body' => $this->faker->text
        ];
        $response = $this->putJson(route('posts.update', $post->id), $dataUpdate);
        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseHas('posts', [
            'name' => $dataUpdate['name'],
            'body' => $dataUpdate['body']
        ]);
    }
    #[Test]

    public function user_can_not_update_post_if_data_is_invalid()
    {
        $post = Post::factory()->create();
        $dataUpdate = [
            'name' => '',
            'body' => ''
        ];
        $response = $this->json('PUT', route('posts.update', $post->id), $dataUpdate);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJson(
            fn(AssertableJson $json) =>
            $json->has('errors', fn(AssertableJson $json) => $json->has('name')
                ->has('body')->etc())->etc()
        );
    }

    #[Test]

    public function user_can_not_update_post_not_exists_if_data_is_valid()
    {
        $post = Post::factory()->create();
        $dataUpdate = [
            'name' => $this->faker->name,
            'body' => $this->faker->text
        ];
        $response = $this->json('PUT', route('posts.update', -1), $dataUpdate);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
