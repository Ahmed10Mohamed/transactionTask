<?php

namespace Tests\Feature\Api\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
        use RefreshDatabase , WithFaker;

  
    public function test_with_no_data(): void
    {
        $response = $this->withHeaders([
            'x-api-key' => 'mwDA9w',
        ])->postJson('/api/register', []);


        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'name',
                'phone',
                'password',
            ]);
    }
    public function test_with_valid_data(): void
    {
        $password = 'password123';
        $response = $this->withHeaders([
            'x-api-key' => 'mwDA9w',
        ])->postJson('/api/register', [
            'name' => $this->faker->name(),
            'phone' => '01234567890',
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'success',
                    'code',
                ]);

        if ($response->json('success')) {
            $response->assertJsonStructure([
                'data' => [
                    'id',
                    'full_name',
                    'phone',
                    'access_token',
                ],
            ]);
        }
    }
    public function test_invalid_name(): void
    {
        $password = 'password123';
        $response = $this->withHeaders([
            'x-api-key' => 'mwDA9w',
        ])->postJson('/api/register', [
            'name' => '',
            'phone' => '01234567890',
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'name',
            ]);
    }
    public function test_invalid_phone(): void
    {
        $password = 'password123';
        $response = $this->withHeaders([
            'x-api-key' => 'mwDA9w',
        ])->postJson('/api/register', [
            'name' => $this->faker->name(),
            'phone' => '12345',
            'password' => $password,
            'password_confirmation' => $password,
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'phone',
            ]);
    }
  
    public function test_invalid_password(): void
    {
        $response = $this->withHeaders([
            'x-api-key' => 'mwDA9w',
        ])->postJson('/api/register', [
            'name' => $this->faker->name(),
            'phone' => '01234567890',
            'password' => '123',
            'password_confirmation' => '1234',
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'password',
            ]);
    }   

    
}
