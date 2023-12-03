<?php

namespace App\Services\Internal\Recommendation;

use Illuminate\Support\Collection;

interface RecommendationService {

    public function getRecommendedMovies(int $userId) : Collection;
}