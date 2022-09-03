<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

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
            'blood_group' => $this->faker->text(255),
            'registration_no' => $this->faker->text(255),
            'roll_no' => $this->faker->text(255),
            'religion' => $this->faker->text(255),
            'address' => $this->faker->text,
            'division' => $this->faker->text(255),
            'district' => $this->faker->text(255),
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'extra_activities' => $this->faker->text,
            'remarks' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'user_id' => \App\Models\User::factory(),
            'parent_id' => \App\Models\Parent::factory(),
            'section_id' => \App\Models\Section::factory(),
            'student_group_id' => \App\Models\StudentGroup::factory(),
            'main_subject_id' => \App\Models\Subject::factory(),
            'optional_subject_id' => \App\Models\Subject::factory(),
            'academic_class_id' => \App\Models\AcademicClass::factory(),
        ];
    }
}
