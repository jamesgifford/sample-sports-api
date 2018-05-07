<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            factory(App\Models\Player::class)->create([
                'team_id' => rand(1, 20)
            ]);
        }
    }
}
