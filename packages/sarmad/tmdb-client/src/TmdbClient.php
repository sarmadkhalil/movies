<?php

namespace Sarmad\TmdbClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class TmdbClient
{
    public static function getMoviesWithData(int $page)
    {
        $client = new Client();

        try {
            $response = $client->request('GET', 'https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc&with_genres=AND', [
                'headers' => [
                    'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIzM2NkNDFkODczZmIzM2VhMzRlYjc0MzNjZjVlYjFiNyIsInN1YiI6IjY1Njc0ZGUzYzJiOWRmMDEwMDRjYmMyYSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.phjKqdBr9gq7oZ9P0TvNrfqNASW4j3qhnOc1xMp7v7w',
                    'accept' => 'application/json',
                ],
            ]);
            return json_decode($response->getBody()->getContents(),true);
        } catch (GuzzleException $th) {
            throw $th;
        }
    }
}
