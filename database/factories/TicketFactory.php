<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 4),
            't_category_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'ticket_id' => $this->faker->regexify('[A-Z0-9]{10}'),
            'title' => $this->faker->text,
            'priority' => $this->faker->randomElement($array = array ('low','medium','high')),
            'message' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'status' => $this->faker->randomElement($array = array ('open','inprogress','cancel','close'))
        ];
    }
}