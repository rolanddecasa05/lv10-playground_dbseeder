<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Companies;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserCompany>
 */
class UserCompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_ids = User::pluck('id');
        $company_ids = Companies::pluck('id');
      
        return [
            'user_id' => fake()->numberBetween(1, 700),
            'company_id' => fake()->numberBetween(1, 600),
            'job_title' => fake()->jobTitle(),
        ];
    }
}
