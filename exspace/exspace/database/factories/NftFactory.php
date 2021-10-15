<?php

namespace Database\Factories;

use App\Models\Nft;
use Illuminate\Database\Eloquent\Factories\Factory;

class NftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nft::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 4),
            'title' => $this->faker->company,
            'description' => $this->faker->text(100),
            'image' => $this->faker->imageUrl(500,500),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'is_minted' => $this->faker->boolean
        ];
    }
}
