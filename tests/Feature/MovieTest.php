<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieTest extends TestCase
{
    use RefreshDatabase;

    public function test_moviesPageLoadsAndReturns200() {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/movies');

        $response->assertStatus(200);
    }
}
