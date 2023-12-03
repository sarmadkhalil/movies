<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieVoteTest extends TestCase
{
    use RefreshDatabase;

    public function test_pageLoadsAndReturns200() {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/movies/votes');

        $response->assertStatus(200);
    }
}
