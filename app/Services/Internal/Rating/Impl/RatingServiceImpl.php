<?php

namespace App\Services\Internal\Rating\Impl;

use App\Models\Movie;
use App\Models\Rating;
use App\Models\User;
use App\Services\Internal\Rating\RatingService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\LinesOfCode\IllogicalValuesException;

class RatingServiceImpl implements RatingService {
    public function storeRating(int $userId, int $movieId, int $rating) : void {
        Log::info('storing rating for userId '.$userId.' and movieId '.$movieId);

        if($rating > 5) {
            throw new IllogicalValuesException("Value cannot be greater than 5");
        }

        try {
            $user = User::findOrFail($userId);
        }catch (ModelNotFoundException $e) {
            throw $e;
        }

        try {
            $movie = Movie::findOrFail($movieId);
        }catch (ModelNotFoundException $e) {
            throw $e;
        }
        
        DB::transaction(function() use ($userId, $movieId, $rating) {
            Rating::create([
                'user_id' => $userId,
                'movie_id' => $movieId,
                'rating' => $rating
            ]);
        });
    }

}