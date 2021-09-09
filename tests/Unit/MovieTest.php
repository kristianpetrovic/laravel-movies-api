<?php

namespace Tests\Unit;

use App\Models\Movie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MovieTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_can_create_movie() {

        $data = [
            'title' => $this->faker->name,
            'description' =>  $this->faker->paragraph,
            'duration' =>  $this->faker->numberBetween(60, 300),
            'genre' =>  $this->faker->word(),
            'likes' =>  $this->faker->numberBetween(0, 200)
        ];

        $this->post(route('movies.store'), $data)
            ->assertStatus(201)   
            ->assertJson($data);
    }

    public function test_can_update_movie() {

        $movie = Movie::factory()->create();

        $data = [
            'title' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'duration' => $this->faker->numberBetween(60, 300),
            'genre' => $this->faker->word(),
            'likes' => $this->faker->numberBetween(0, 200)
        ];

        $this->put(route('movies.update', $movie->id), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function test_can_show_movie() {

        $movie = Movie::factory()->create();

        $this->get(route('movies.show', $movie->id))
            ->assertStatus(200);
    }

    public function test_can_delete_movie() {

        $movie = Movie::factory()->create();

        $this->delete(route('movies.destroy', $movie->id))
            ->assertStatus(200);
    }

    public function test_can_list_movies() {

        $movies = Movie::factory()->count(2)->create();

        $this->get(route('movies.index'))
            ->assertStatus(200)
            ->assertJson($movies->toArray())
            ->assertJsonStructure([
                '*' => [ 'id', 'title', 'description', 'genre', 'duration', 'likes' ],
            ]);
    }
}
