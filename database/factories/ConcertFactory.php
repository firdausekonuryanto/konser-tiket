<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\concert>
 */
class ConcertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Festival', 'VIP', 'Presale'];

        return [
            'judul' => 'Konser ' . $this->faker->word(),
            'artis' => $this->faker->name(),
            'waktu' => $this->faker->dateTimeBetween('+1 week', '+2 months'),
            'lokasi' => $this->faker->city(),
            'harga' => $this->faker->randomElement([0, 50000, 100000, 150000]),
            'kuota' => $this->faker->numberBetween(50, 500),
            'kategori' => $this->faker->randomElement($categories),
            'gambar' => null,
        ];
    }
}