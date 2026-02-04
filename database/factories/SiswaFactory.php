<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->numberBetween(1, 99999),
            'nama' => $this->faker->name(),
            'kelas' => $this->faker->randomElement(['X', 'XI', 'XII']),
            'alamat' => $this->faker->address(),
            'hp' => $this->faker->phoneNumber(),
        ];
    }
}