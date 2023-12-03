<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\MovieSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieVoteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_loadSingleMoviePageForVotingAndReturn200(): void
    {
        $this->seed(MovieSeeder::class);
        
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/movies/2/vote');

        $response->assertStatus(200);
    }
}
