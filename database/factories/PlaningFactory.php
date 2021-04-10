<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Planing;
use Illuminate\Database\Eloquent\Factories\Factory;


class PlaningFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Planing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'building_id' => $this->faker->numberBetween($min = 1, $max = 200),
            'isp' => $this->faker->regexify('ISP-[0-9]{4,6}'),
            'ispCode' => $this->faker->regexify('ISP-[A-Z]-[0-9]{10}'),
            'fees' => $this->faker->regexify('FEES-[0-9]{4,6}'),
            'confirming' => Carbon::now()->format('Y-m-d H:i:s'),
            'team_id' => $this->faker->numberBetween($min = 1, $max = 20),
            'remark' => $this->faker->sentence($nbWords = 6, $variableNbWords = true) ,
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => NULL,
            'subStatus' => NULL,
            'dateConnect' => Carbon::now()->format('Y-m-d H:i:s'),
            'dateDisconnect' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
    }
}