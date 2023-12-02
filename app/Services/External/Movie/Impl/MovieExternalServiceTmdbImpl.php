<?php

namespace App\Services\External\Movie\Impl;

use App\Services\External\Movie\MovieExternalService;
use Illuminate\Support\Facades\Log;
use Sarmad\TmdbClient\TmdbClient;

class MovieExternalServiceTmdbImpl implements MovieExternalService
{
    public function getMovies(int $pages): array
    {
        $movies = [];
        try {
            for ($i = 1; $i <= $pages; $i++) {
                $movie = TmdbClient::getMoviesWithData($i);
                foreach ($movie as $key) {
                    array_push($movies, $key);
                }
            }
            Log::debug("Size of movies - ". sizeof($movies));
            return $movies;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
