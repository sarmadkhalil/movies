<?php

namespace App\Services\Internal\Rating;

use Illuminate\Pagination\LengthAwarePaginator;

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
    
    /**
     * getHistoryOfRatings
     *
     * @param  mixed $userId
     */
    public function getHistoryOfRatings(int $userId);
}