<?php

namespace Database\Factories\Entities;

use App\Entities\ShippingCompany;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingCompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShippingCompany::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
        ];
    }
}
