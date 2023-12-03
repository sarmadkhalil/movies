<?php

namespace Tests\Feature;

use App\Models\Movie;
use App\Models\User;
use App\Services\Internal\Rating\Impl\RatingServiceImpl;
use Database\Seeders\MovieSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RatingHistoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_goToHistoryAndLoadHistoryPageReturn200(): void
    {
        $this->seed([UserSeeder::class,MovieSeeder::class]);
        $user = User::all()->first();
        $movie = Movie::all()->first();

        $service = new RatingServiceImpl();
        $service->storeRating($user->id, $movie->id, 4);

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
    }
}
