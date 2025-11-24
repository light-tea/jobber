<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    return [
        'title' => $this->faker->jobTitle(),
        'company' => $this->faker->company(),
        'location' => $this->faker->city(),
        'salary' => $this->faker->randomElement(['50,000', '60,000', '70,000', '80,000']),
        'type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract', 'Internship']),
        'description' => $this->faker->paragraph(),

        'requirements' => [
            '3+ years full stack experience',
            'Proficiency in Node.js or Python',
            'React or Angular experience',
            'SQL and NoSQL databases',
            'API design and development'
        ],

        'benefits' => [
            'Flexible hours',
            'Health & wellness programs',
            'Unlimited PTO',
            'Tech equipment budget',
            'Equity compensation'
        ],
    ];
}

}
