<?php

namespace App\Services\Internal\Movie;

use App\Models\Movie;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

interface MovieInternalService {
    
    
    /**
     * Gets the list of movies from local storage
     *
     * @param  mixed $perPage
     * @return LengthAwarePaginator
     */
    public function getMovies(int $perPage) : LengthAwarePaginator;
        
    /**
     * Store array Movies to local storage
     * 
     * This function takes in array of Movies, loops through each item and stores it in database
     *
     * @param  Movie[] $movies
     * @return void
     */
    public function storeMovies(array $movies) : void;
    
    /**
     * Store array Movies to local storage
     * 
     * This function takes in array of Movies, loops through each item and stores it in database
     *
     * @param  Movie $movie
     * @return void
     */
    public function storeMovie(Movie $movie) : void;
    
    /**
     * Get single movie based on the given id
     *
     * @param  int $id
     * @return ModelNotFoundException
     */
    public function getSingleMovie(int $id) : Movie;
}