<?php

namespace App\Http\Controllers;

use App\Services\Internal\Movie\MovieInternalService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieVoteController extends Controller
{
    private MovieInternalService $movieInternalService;

    public function __construct(MovieInternalService $movieInternalService) {
        $this->movieInternalService = $movieInternalService;
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
}
