<?php

namespace App\Services\Internal;

use App\Models\Movie;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * 
 */
interface MovieService {
        
    /**
     * Gets the list of movies from local storage
     *
     * @return array
     * @throws ModelNotFoundException
     */
    public function getMovies() : array;
        
    /**
     * Store array Movies to local storage
     * 
     * this function takes in array of Movies, loops through each item and stores it in database
     *
     * @param  Movie[] $movies
     * @return void
     */
    public function storeMovies(array $movies) : void;
    
    /**
     * Store array Movies to local storage
     * 
     * this function takes in array of Movies, loops through each item and stores it in database
     *
     * @param  Movie $movie
     * @return void
     */
    public function storeMovie(Movie $movie) : void;
    
    /**
     * getSingleMovie
     *
     * @param  int $id
     * @return ModelNotFoundException
     */
    public function getSingleMovie(int $id) : Movie;
}