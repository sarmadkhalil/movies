<?php

namespace Tests\Feature;

use App\Models\Rating;
use App\Services\Internal\Rating\Impl\RatingServiceImpl;
use Database\Seeders\MovieSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RatingServiceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_storeRatingsForMoviesOfSpecificUser(): void
    {
        $this->seed([MovieSeeder::class, UserSeeder::class]);
        $user_id= 1;
        $movie_id=1;

        $rating = 4;

        $service = new RatingServiceImpl();

        $service->storeRating($user_id,$movie_id, $rating);

        $ratings = Rating::all()->toArray();

        $this->assertTrue(count($ratings) > 0);
    }
}
