<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TeamUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i<=50; $i++):
            DB::table('team_user')
                ->insert([
                    'user_id' => $faker->numberBetween($min = 1, $max = 50),
                    'team_id' => $faker->numberBetween($min = 1, $max = 20),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        endfor;
    }
}