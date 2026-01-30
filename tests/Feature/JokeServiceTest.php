<?php

namespace Tests\Feature;

use Tests\TestCase;

class JokeServiceTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_random_jokes_returns_expected_structure()
    {
        $response = $this->getJson('/api/jokes?limit=3');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'status_code',
                     'message',
                     'data' => [
                         '*' => [
                             'id',
                             'type',
                             'setup',
                             'punchline'
                         ]
                     ]
                 ]);
        $this->assertLessThanOrEqual(3, count($response->json('data')));
    }

    public function test_get_random_jokes_handles_api_failure()
    {
        $response = $this->getJson('/api/jokes?limit=3&url=invalid/url');

        $response->assertStatus(500)
                 ->assertJson([
                     'status' => 'failed',
                     'status_code' => 500,
                 ]);
    }
}
