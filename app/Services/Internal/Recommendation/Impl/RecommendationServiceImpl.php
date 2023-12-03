<?php

namespace App\Services\Internal\Recommendation\Impl;

use App\Models\Movie;
use App\Models\Rating;
use App\Models\User;
use App\Services\Internal\Recommendation\RecommendationService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class RecommendationServiceImpl implements RecommendationService
{
    public function getRecommendedMovies(int $userId): Collection
    {
        Log::info('start of recommendation service to get movies');
        $user = User::find($userId);
        $userRatedGenres = $this->getUserRatedGenres($user);


        // Get Movies with Similar Genres
        $recommendedMovies = Movie::whereNotIn('id', $this->getUserRatedMovies($userId)->pluck('movie_id')->toArray())
            ->where(function ($query) use ($userRatedGenres) {
                foreach ($userRatedGenres as $genre) {
                    $query->orWhere('genre', 'LIKE', '%' . $genre . '%');
                }
            })
            ->inRandomOrder()
            ->take(10)
            ->get();

        // Check if the number of recommended movies is less than 4
        if ($recommendedMovies->count() < 4) {
            $recommendedMovieIds = $recommendedMovies->pluck('id')->toArray();

            // Fetch additional random movies that are not part of user's rated genres and not rated by the user
            $additionalMovies = Movie::whereNotIn('id', $this->getUserRatedMovies($userId)->pluck('movie_id')->toArray())
                ->whereNotIn('id', $recommendedMovieIds)
                ->inRandomOrder()
                ->where('rating', '>', 3) // Movies rated above 3
                ->take(4 - $recommendedMovies->count())
                ->get();

            // Merge the additional movies with the recommended movies
            $recommendedMovies = $recommendedMovies->merge($additionalMovies);
        }

        Log::info('End of recommendation service to get movies');
        return $recommendedMovies;
    }

    private function getUserRatedGenres(User $user)
    {
        // Retrieve Genres of User's Rated Movies
        $userRatedMovies = $this->getUserRatedMovies($user->id);

        $userRatedGenres = [];
        foreach ($userRatedMovies as $movie) {
            $genres = explode(',', $movie->genre);
            $userRatedGenres = array_merge($userRatedGenres, $genres);
        }

        // Remove duplicate genres
        return array_unique($userRatedGenres);
    }

    private function getUserRatedMovies(int $userId)
    {
        $userRatedMovies = Rating::where('user_id', $userId)
            ->where('rating', '>', 3)
            ->with('movie')
            ->get();

        return $userRatedMovies;
    }
}
