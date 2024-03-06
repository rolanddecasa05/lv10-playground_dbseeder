<?php
namespace Tests\Unit\User;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_create_users(): void
    {
        $data = [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => '123456789',
            'age' => fake()->numberBetween(16, 68),
            'gender' => fake()->randomElement(['F', 'M'])
        ];

        $response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
        ])->postJson('/api/users', $data);

        $response->assertStatus(200);
    }
    /**
     * A basic unit test example.
     */
    public function test_get_users(): void
    {
        $response = $this->get('/api/users');
        $response->assertStatus(200);
    }

     /**
     * A basic unit test example.
     */
    public function test_get_user(): void
    {
        $user = User::first();
        $response = $this->get('/api/users/'.$user->id);
        $response->assertStatus(200);
    }

    /**
     * A basic unit test example.
     */
    public function test_update_user(): void
    {
        $data = [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => '123456789',
            'age' => fake()->numberBetween(16, 68),
            'gender' => fake()->randomElement(['F', 'M'])
        ];

        $user = User::first();

        $response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
        ])->putJson('/api/users/'.$user->id, $data);
        
        $response->assertStatus(200);
    }

     /**
     * A basic unit test example.
     */
    public function test_delete_user(): void
    {
        $user = User::first();
        $response = $this->delete('/api/users/'.$user->id);
        $response->assertStatus(200);
    }

    /**
     * A basic unit test example.
     */
    public function test_validation_test() : void
    {
        $response = $this->withHeaders([
            'Accept' => 'Application/json',
            'Content_type' => 'Application/json',
        ])->postJson('/api/users', []);

        $response->assertStatus(422);
    }
}
