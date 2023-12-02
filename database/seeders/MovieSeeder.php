<?php

namespace Database\Seeders;

use App\Services\External\Movie\MovieExternalService;
use App\Services\Internal\Movie\MovieInternalService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class MovieSeeder extends Seeder
{
    private $movieExternalService;
    private $movieInternalService;

    public function __construct(MovieExternalService $movieExternalService, MovieInternalService $movieInternalService) {
        $this->movieExternalService = $movieExternalService;
        $this->movieInternalService = $movieInternalService;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfPages = 10;
        $movies = [];
        try {
            Log::debug('Storing movie with external id to Database');
            $movies = $this->movieExternalService->getMovies($numberOfPages);
            Log::debug("Size of movies - ".sizeof($movies));
            
            $this->movieInternalService->storeMovies($movies);
        } catch (\Exception $e) {
            $error = $e->getMessage().' , '.$e->getTraceAsString();
            Log::error($error);
        }
    }
}
