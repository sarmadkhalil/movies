<?php

namespace Sarmad\TmdbClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class TmdbClient
{
    public static function getMoviesWithData(int $page) : array
    {
        $movies = [];
        $client = new Client();

        try {
            $response = $client->request('GET', 'https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page='.$page.'&sort_by=popularity.desc&with_genres=AND', [
                'headers' => [
                    'Authorization' => 'Bearer ' . config('tmdbconfig.auth_token'),
                    'accept' => 'application/json',
                ],
            ]);
            
            $object = json_decode($response->getBody()->getContents());
            $movies = $object->results;

            return $movies;
        } catch (GuzzleException $th) {
            throw $th;
        }
    }
}
