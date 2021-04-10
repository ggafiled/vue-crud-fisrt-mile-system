<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Building;
use Illuminate\Database\Eloquent\Factories\Factory;


class BuildingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Building::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fmCode' => $this->faker->regexify('[A-Z]{2,4}-[0-9]{4,6}'),
            'member_id' => $this->faker->numberBetween($min = 1, $max = 50),
            'buildingName' => $this->faker->company,
            'detailAdress' => $this->faker->address,
            'province' => $this->faker->country,
            'city' => $this->faker->city,
            'postalCode' => $this->faker->postcode,
            'zone' => $this->faker->randomElement($array = array ('asia','europe')),
            'area' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10),
            'townNumber' => $this->faker->randomDigit,
            'floor' => $this->faker->randomDigit,
            'roomNumber' => $this->faker->randomDigit,
            'contract' => Carbon::now()->format('Y-m-d H:i:s') ,
            'contractTime' => Carbon::now()->format('Y-m-d H:i:s'),
            'latitude' => $this->faker->latitude($min = -90, $max = 90),
            'longtude' => $this->faker->longitude($min = -180, $max = 180),
            'priceSquare' => $this->faker->numberBetween($min = 100000, $max = 900000),
            'workingTime' => Carbon::now()->format('Y-m-d H:i:s'),
            'blance' => $this->faker->numberBetween($min = 100000, $max = 900000),
            'developer' => NULL,
            'grade' => NULL
        ];
    }
}