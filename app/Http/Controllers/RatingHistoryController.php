<?php

namespace App\Http\Controllers;

use App\Services\Internal\Rating\RatingService;
use Illuminate\Http\Request;

class RatingHistoryController extends Controller
{
    private RatingService $ratingService;
    
    public function __construct(RatingService $ratingService) {
        $this->ratingService = $ratingService;
    }
    public function index() {
        $ratings = $this->ratingService->getHistoryOfRatings(auth()->user()->id);
        return view('movies.vote.history.index')->with('ratings',$ratings);
    }
}
