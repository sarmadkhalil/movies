<?php

namespace App\Services\Internal\Recommendation;

interface RecommendationService {

    public function getRecommendedMovies(int $userId);
}