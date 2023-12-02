<?php

namespace App\Services\External\Movie;

interface MovieExternalService {        
    /**
     * Get movies from External database
     *
     * @param  mixed $pages
     * @return array
     */
    public function getMovies(int $pages) : array;
}