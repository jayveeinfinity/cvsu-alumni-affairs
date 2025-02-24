<?php

namespace Database\Factories;

use App\Models\JobPosting;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobPostingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = JobPosting::class;

    public function definition()
    {
        return [
            'title' => $this->faker->randomElement([
                'Senior UI Designer', 
                'Junior Frontend Developer', 
                'Backend Engineer', 
                'Full Stack Developer'
            ]),
            'company' => $this->faker->company(),
            'location' => $this->faker->city() . ', ' . $this->faker->state() . ', ' . $this->faker->country(),
            'job_type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract']),
            'experience' => $this->faker->randomElement(['1 Year', '2 Years', '3 Years', '5+ Years']),
            'salary_min' => $this->faker->numberBetween(3000, 10000),
            'salary_max' => $this->faker->numberBetween(12000, 20000),
            'currency' => 'USD',
            'job_description' => $this->faker->paragraph(5),
            'responsibilities' => $this->faker->paragraph(3),
            'requirements' => $this->faker->paragraph(3),
            'skills_experience' => $this->faker->sentence(10),
            'salary_benefits' => $this->faker->sentence(6),
            'apply_link' => $this->faker->url(),
            'posted_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
