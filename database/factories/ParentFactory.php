<?php

namespace Database\Factories;

use App\Models\Parent;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = parent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->text(255),
            'name_english' => $this->faker->name,
            'name_bangla' => $this->faker->text(255),
            'email' => $this->faker->unique->email,
            'phone' => $this->faker->phoneNumber,
            'fathers_profession' => $this->faker->text(255),
            'mothers_profession' => $this->faker->text(255),
            'dob' => $this->faker->text(255),
            'dob_timestamp' => $this->faker->dateTime,
            'gender' => array_rand(array_flip(['male', 'female', 'other']), 1),
            'religion' => $this->faker->text(255),
            'address' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
