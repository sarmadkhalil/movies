<?php

namespace App\Services\Internal\Rating;

interface RatingService {    
    /**
     * storeRating
     *
     * @param  mixed $userId
     * @param  mixed $movieId
     * @param  mixed $rating
     * @return void
     */
    public function storeRating(int $userId, int $movieId, int $rating) : void;
}