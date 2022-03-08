<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

class StudentFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Student::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'birth_day' => $this->faker->dateTime(),
            'civil_state_id' => \App\Models\CivilState::all()->random(1)->first()->id,
            'natural_of' => $this->faker->word,
            'natural_location' => $this->faker->word,
            'natural_district' => $this->faker->word,
            'natural_province' => $this->faker->word,
            'father_name' => $this->faker->word,
            'mother_name' => $this->faker->word,
            'place_location' => $this->faker->word,
            'place_district' => $this->faker->word,
            'place_province' => $this->faker->word,
            'place_zone' => $this->faker->word,
            'id_identity' => $this->faker->word,
            'id_emision_date' => $this->faker->dateTime(),
            'id_emited_with' => $this->faker->word,
            'admited_at' => $this->faker->dateTime(),
            'veicle_classe_id' => \App\Models\VeicleClass::all()->random(1)->first()->id,
            'student_code' => $this->faker->word,
            'test_1' => $this->faker->randomFloat(),
            'test_2' => $this->faker->randomFloat(),
            'test_3' => $this->faker->randomFloat(),
            'test_4' => $this->faker->randomFloat(),
            'teoric_lessons' => $this->faker->randomNumber(),
            'pratice_lessons' => $this->faker->randomNumber(),
            'tecnic_lessons' => $this->faker->randomNumber(),
            'result' => $this->faker->randomFloat(),
            'genre' => $this->faker->boolean,
        ];
    }
}
