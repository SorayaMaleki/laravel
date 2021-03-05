<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRequiredFieldsForRegistration()
    {
        $this->json("POST", "api/register", ['Accept' => "application/json"])
            ->assertStatus(422)
            ->assertJson([
                "errors" => [
                    "name" => [
                        "The name field is required."
                    ],
                    "email" => [
                        "The email field is required."
                    ],
                    "password" => [
                        "The password field is required."
                    ]
                ],
            ]);
    }

    public function testConfirmPassword()
    {
        $userData = [
            'name' => "soraya",
            'email' => "sorayamaleki08@gmail.com",
            'password' => "123456789",
        ];
        $this->json("POST", "api/register", $userData, ['Accept' => "application/json"])
            ->assertStatus(422)
            ->assertJson([
                "errors" => [
                    "password" => [
                        "The password confirmation does not match."
                    ]
                ],
            ]);
    }

    public function testSuccessfulRegistration()
    {
        $userData = [
            "name" => "soraya",
            "email" => "sorayamaleki08@gmail.com",
            "password" => "123456789",
            "password_confirmation" => "123456789"
        ];
        $this->json("POST", "api/register", $userData, ["accept" => "application/json"])
            ->assertStatus(201)
            ->assertJsonStructure([
                "name",
                "email",
                "updated_at",
                "created_at",
                "id",
            ]);
    }
}
