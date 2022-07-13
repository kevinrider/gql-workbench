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
        //Create some movies
        $movies = Movie::factory()->count(50)->create();

        foreach ($movies as $movie) {
            //Setup Characters
            $characters = Character::factory()->count(5)->create();
            //Todo: Setup Character to Movies
        }
    }
}
