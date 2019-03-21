<?php

use App\Player;
use App\Team;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Team::class, 16)->create()->each(function (Team $team) {
            for ($i = 0; $i < 11; $i++) {
                $team->players()->save(factory(Player::class)->make());
            }
        });
    }
}
