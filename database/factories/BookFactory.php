<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_code' => Str::random(8),
            'isbn' => Str::random(16),
            'title' => Str::title($this->faker->words(3, true)),
            'edition' => Arr::first(Arr::shuffle([1, 2, 3, 4])),
            'publication_year' => Arr::first(Arr::shuffle([2001, 2002, 2014, 2015])),
            'published_at' => $this->faker->city(),
            'exemplar' => Arr::first(Arr::shuffle([202, 40024, 321])),
            'amount' => Arr::first(Arr::shuffle([12, 23, 31, 4, 55])),
            'author_id' => Arr::first(Arr::shuffle([1, 2])),
            'publisher_id' => Arr::first(Arr::shuffle([1, 2])),
        ];
    }
}
