<?php

namespace App\Http\Controllers;

use App\Services\Internal\Movie\MovieInternalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieVoteController extends Controller
{
    private $movieInternalService;

    public function __construct(MovieInternalService $movieInternalService) {
        $this->movieInternalService = $movieInternalService;
    }

    public function index() {
        Log::info("This page is used to get the list of movies to vote on.");
        $movies = $this->movieInternalService->getMovies(10);
        return view('movies.vote.index')->with('movies', $movies);
    }
}
