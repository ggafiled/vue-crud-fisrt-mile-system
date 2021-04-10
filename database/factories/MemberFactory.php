<?php

namespace Database\Factories;


use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;


class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'phone1' => $this->faker->phoneNumber,
            'phone2' => $this->faker->phoneNumber,
            'province' => $this->faker->citySuffix,
            'city' => $this->faker->city,
            'detailAdress' => $this->faker->address,
            'postalCode' => $this->faker->postcode
        ];
    }
}