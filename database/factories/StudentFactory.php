<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'nisn' => $this->faker->isbn13(),
            'gender' => Arr::first(Arr::shuffle(['M', 'F'])),
            'address' => $this->faker->address()
        ];
    }
}
