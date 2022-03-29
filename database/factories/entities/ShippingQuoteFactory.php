<?php

namespace Database\Factories\Entities;

use App\Entities\ShippingCompany;
use App\Entities\ShippingQuote;
use App\Helpers\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingQuoteFactory extends Factory
{
    use State;

     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShippingQuote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transportadora_id' => ShippingCompany::factory(),
            'valor_extra' => $this->faker->numberBetween(0, 9000),
            'uf' => $this->getAllStates()[array_rand($this->getAllStates())],
            'percentual_cotacao' => $this->faker->numberBetween(1, 9000),
        ];
    }
}
