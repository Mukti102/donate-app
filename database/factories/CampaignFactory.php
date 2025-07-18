<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            return [
            'title' => $this->faker->sentence(4),
            'thumbnail' => 'images/campaigns/',
            'category_campaign_id' => 1 ,// atau manual isi id
            'name_lembaga' => $this->faker->company,
            'logo_lembaga' => 'images/logos/',
            'dedline' => $this->faker->date(), // kalau pakai string, pastikan konsisten
            'story' => $this->faker->paragraph(3),
            'penyaluran' => $this->faker->paragraph(2),
        ];
    }
}
