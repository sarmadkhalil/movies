<?php

namespace App\Http\Controllers;

use App\Services\Internal\Movie\MovieInternalService;
use App\Services\Internal\Recommendation\RecommendationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    private RecommendationService $recommendationService;

    public function __construct(RecommendationService $recommendationService) {
        $this->recommendationService = $recommendationService;
    }

    public function index() {
        Log::info("This page is used to get the list of movies to vote on.");
        $movies = $this->recommendationService->getRecommendedMovies(auth()->user()->id);
        return view('movies.index')->with('movies', $movies);
    }
}
