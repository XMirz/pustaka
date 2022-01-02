<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class MemberFactory extends Factory
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
            'role' => Arr::first(Arr::shuffle(["Siswa", "Guru", "Karyawan"])),
            'nisn' => $this->faker->isbn13(),
            'gender' => Arr::first(Arr::shuffle(['M', 'F'])),
            'address' => $this->faker->address(),
        ];
    }
}
