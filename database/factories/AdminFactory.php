<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_english' => $this->faker->name,
            'name_bangla' => $this->faker->text(255),
            'username' => $this->faker->text(255),
            'email' => $this->faker->unique->email,
            'phone' => $this->faker->phoneNumber,
            'dob' => $this->faker->text(255),
            'dob_timestamp' => $this->faker->dateTime,
            'gender' => array_rand(array_flip(['male', 'female', 'other']), 1),
            'religion' => $this->faker->text(255),
            'image' => $this->faker->text,
            'address' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
