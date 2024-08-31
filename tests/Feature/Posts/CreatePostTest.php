<?php

namespace Tests\Feature\Posts;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;


class CreatePostTest extends TestCase
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
    public function user_can_create_post_if_data_is_valid()
    {
        $dataCreate = [
            'name' => $this->faker->name,
            'body' => $this->faker->text
        ];
        $response = $this->json('POST', route('posts.store'), $dataCreate);
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson(
            fn(AssertableJson $json) =>
            $json->has(
                'data',
                fn(AssertableJson $json) =>
                $json->has('name')->etc()
            )->etc()
        );
        $this->assertDatabaseHas('posts', [
            'name' => $dataCreate['name'],
            'body' => $dataCreate['body']
        ]);
    }
    #[Test]
    public function user_can_not_create_post_if_data_is_invalid()
    {
        $dataCreate = [
            'name' => '',
            'body' => ''
        ];
        $response = $this->json('POST', route('posts.store'), $dataCreate);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJson(
            fn(AssertableJson $json) =>
            $json->has('errors', fn(AssertableJson $json) => $json->has('name')
            ->has('body')->etc())->etc()
        );
    }
}
