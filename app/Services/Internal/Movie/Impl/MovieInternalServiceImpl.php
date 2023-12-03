<?php

namespace App\Services\Internal\Movie\Impl;

use App\Models\Movie;
use App\Services\Internal\Movie\MovieInternalService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class MovieInternalServiceImpl implements MovieInternalService {

    public function getMovies(int $perPage) : LengthAwarePaginator {
        $movies = Movie::paginate($perPage);
        return $movies;
    }
        
    public function storeMovies(array $movies) : void {
        try {
            foreach ($movies as $movie) {
                // dd($movie->id); 
                Log::debug('Storing movie with external id = '.$movie->id.' to Database');
                $genres = "";
                $i=0;
                $numItems = count($movie->genre_ids);
                foreach($movie->genre_ids as $ids) {
                    $genres .= $ids;
                    if(++$i != $numItems){
                        $genres .= ",";
                    }
                }

                $movie1 = new Movie();
                $movie1->external_id = $movie->id;
                $movie1->title = $movie->title;
                $movie1->overview = $movie->overview;
                $movie1->release_date = $movie->release_date; 
                $movie1->votes = $movie->vote_average;
                $movie1->genre = $genres;
                $movie1->poster_path = $movie->poster_path;
                $movie1->save();
                // $this->storeMovie($movie1);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function storeMovie(Movie $movie) : void {
        Movie::create([$movie]);
    }
    
    public function getSingleMovie(int $id) : Movie {
        return Movie::findOrFail($id); 
    }

}