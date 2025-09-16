<?php

namespace Database\Factories;
use App\Models\Track;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'name' => $this->faker->words(2, true),
        'image' => 'https://via.placeholder.com/150',
        'description' => $this->faker->paragraph,
        'code' => strtoupper($this->faker->bothify('CS###')),
        'track_id' => \App\Models\Track::inRandomOrder()->first()?->id,
    ];
}

}
