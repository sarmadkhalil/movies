<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\MovieSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    public function test_saveRatingsForMovieOfSpecificUserReturnRedirect(): void
    {
        $this->seed([MovieSeeder::class, UserSeeder::class]);
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/movies/2/vote', ['star' => 3]);

        $response->assertStatus(302);
        $response->assertRedirect('movies');
    }
}
