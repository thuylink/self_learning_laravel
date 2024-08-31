<?php

namespace Tests\Feature\Posts;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class GetListPostTest extends TestCase
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
    public function user_can_get_list_posts()
    {
        $response = $this->getJson(route('posts.index'));
        $response->assertStatus(Response::HTTP_OK);
        // dd($response->json());

        $response->assertJson(
            fn(AssertableJson $json) =>
            $json->has(
                'data',
                fn(AssertableJson $json) =>
                $json->has('data')
                    // ->has('meta')
                    ->etc()
            )
                ->has('message')
        );
    }
}
