<?php

namespace Tests\Feature\Api\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
        use RefreshDatabase , WithFaker;

  
    public function test_with_no_data(): void
    {
        $response = $this->withHeaders([
            'x-api-key' => 'mwDA9w',
        ])->postJson('/api/login', []);
        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'phone',
                'password',
        ]);
    }   
    public function test_with_valid_data(): void
    {
        // create user first
        $password = 'password123';
        $user = \App\Models\User::factory()->create([
            'phone' => '01234567890',
             'name' => $this->faker->name(),
            'password' => bcrypt($password),
        ]);
        $response = $this->withHeaders([
            'x-api-key' => 'mwDA9w',
        ])->postJson('/api/login', [
            'phone' => '01234567890',
            'password' => $password,
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
    public function test_invalid_phone(): void
    {
        $password = 'password123';
        $response = $this->withHeaders([
            'x-api-key' => 'mwDA9w',
        ])->postJson('/api/login', [
            'phone' => '09876543210',
            'password' => $password,
        ]);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => false,
                    'message' => translate('this phone not correct'),
                    'code' => 200,
                ]);
    }   
    public function test_invalid_password(): void
    {
        // first create user
        $correctPassword = 'password123';
        $user = \App\Models\User::factory()->create([
            'phone' => '01234567890',
            'password' => bcrypt($correctPassword),
        ]);
        $response = $this->withHeaders([
            'x-api-key' => 'mwDA9w',
        ])->postJson('/api/login', [
            'phone' => '01234567890',
            'password' => 'wrongpassword',
        ]);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => false,
                    'message' => translate('this password not correct'),
                    'code' => 200,
                ]);
    }   
}
