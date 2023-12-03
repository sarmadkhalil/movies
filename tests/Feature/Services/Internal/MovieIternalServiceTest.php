<?php

namespace Tests\Feature\Services\Internal;

use App\Models\Movie;
use App\Services\Internal\Movie\Impl\MovieInternalServiceImpl;
use App\Services\Internal\Movie\MovieInternalService;
use Database\Factories\MovieFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use stdClass;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class MovieIternalServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_storeMovies() : void {
        $movies = $this->getMockMovies(20);

        // dd($movies);

        $service = new MovieInternalServiceImpl();
        $service->storeMovies($movies);
        
        $getSavedMoviesCount = count(Movie::all());
        assertTrue($getSavedMoviesCount == 20);
    }

    private function getMockMovies(int $count) {
        $movies = [];

        $genre = [23,34];
        
        $mock = new stdClass();

        $mock->title = fake()->title();
        $mock->overview= fake()->text(300);
        $mock->poster_path= fake()->image();
        $mock->backdrop_path= fake()->image();
        $mock->release_date= fake()->date('Y-m-d');
        $mock->vote_average= fake()->randomDigit();
        $mock->genre_ids= $genre;
        $mock->id= fake()->randomDigitNotNull();

        for($i=0; $i<$count; $i++) {
            array_push($movies, $mock);
        }

        return $movies;
    }
}
