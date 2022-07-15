<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create fifty movies
        $movies = Movie::factory()->count(50)->create();

        foreach ($movies as $movie) {
            //Setup Five Characters Per Movie
            $characters = Character::factory()->count(5)->create();

            //Setup Character to Movies and Character Friends
            foreach ($characters as $character) {
                //Map this movie to the character
                $character->movies()->save($movie);
                //Each Character has one friend
                $friend = Character::factory()->create();
                $character->friends()->save($friend);
                //Bind friend to movie as well
                $friend->movies()->save($movie);
            }
        }
    }
}
