<?php

namespace App\Http\Controllers;

use App\Services\Internal\Movie\MovieInternalService;
use App\Services\Internal\Rating\RatingService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieVoteController extends Controller
{
    private MovieInternalService $movieInternalService;
    private RatingService $ratingService;

    public function __construct(MovieInternalService $movieInternalService, RatingService $ratingService) {
        $this->movieInternalService = $movieInternalService;
        $this->ratingService = $ratingService;
    }
    public function create($id) {
        try{
            $movie = $this->movieInternalService->getSingleMovie($id);
            
            return view('movies.vote.create')->with('movie', $movie); 
        }catch (ModelNotFoundException $me) {
            Log::error($me->getMessage().", \n".$me->getTraceAsString());
            return redirect()->back()->withErrors(['msg' => 'Movie couldn\'t be found in the existing database']);
        }catch (Exception $e) {
            Log::error($e->getMessage().", \n".$e->getTraceAsString());
            return redirect()->back()->withErrors(['msg' => 'Something went wrong, please try later!']);
        }
    }

    public function store(Request $request, $id) {
        try {
            $this->ratingService->storeRating(auth()->user()->id, $id, $request['star']);

            return redirect()->route('movie.index');
        } catch (Exception $e) {
            Log::error($e->getMessage().', '.$e->getTrace());
            return redirect()->back()->withErrors(['msg' => 'Something went wrong, please try again later!']);
        }
    }
}
