<?php

namespace Tests\Feature\Packages;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Sarmad\TmdbClient\TmdbClient;
use Tests\TestCase;

class TmdbClientTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_getMoviesDataFromClient(): void
    {
        $response = TmdbClient::getMoviesWithData(1);
        
        $this->assertNotNull($response);
    }
}
