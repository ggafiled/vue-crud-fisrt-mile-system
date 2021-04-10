<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner_id' => $this->faker->numberBetween($min = 1, $max = 20),
            'name' => $this->faker->randomElement($array = array ('A Team',
            'All Stars',
            'Amigos',
            'Avengers',
            'Bannermen',
            'Best of the Best',
            'Bosses',
            'Champions',
            'Crew',
            'Dominators',
            'Dream Team',
            'Elite',
            'Force',
            'Goal Diggers',
            'Heatwave',
            'Hot Shots',
            'Hustle',
            'Icons',
            'Justice League',
            'Legends',
            'Lightning',
            'Maniacs',
            'Masters',
            'Monarchy',
            'Naturals',
            'Ninjas',
            'Outliers
            Peak Performers',
            'Power',
            'Rebels',
            'Revolution',
            'Ringmasters',
            'Rule Breakers',
            'Shakedown',
            'Squad',
            'Titans',
            'Tribe',
            'United',
            'Vikings',
            'Warriors',
            'Wolf Pack',
            'Aces',
            'Assassins',
            'Armada',
            'Bandits',
            'Blaze',
            'Brute Force',
            'Chaos',
            'Chosen Ones',
            'Conquerors'
            )),
        ];
    }
}