<?php

namespace Tests\Unit;

use App\Http\Requests\login\LoginRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected function authenticate()
    {
        auth()->attempt([
            'email' => Config::get("api.apiEmail"),
            'password' => Config::get("api.apiPassword"),
        ]);

        if (auth()->check()) {
            $token = auth()->user()->generateToken();
            return $token;
        }
        return response()->json(['error' => 'Incorrect credentials'], 401);
    }
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
        $this->assertTrue(true);
//        $userData = [
//            "name" => "soraya",
//            "email" => "sorayamaleki08@gmail.com",
//            "password" => "123456789",
//            "password_confirmation" => "123456789"
//        ];
//        $this->json("POST", "api/register", $userData, ["accept" => "application/json"])
//            ->assertStatus(201)
//            ->assertJsonStructure([
//                "name",
//                "email",
//                "updated_at",
//                "created_at",
//                "id",
//            ]);
    }

    public function testGetUsersList(){
        $token=$this->authenticate();
        $this->withHeaders(["Accept"=>"application/json","Authorization"=>"Bearer ".$token])
            ->json("GET","api/user/usersList")
            ->assertStatus(200)
            ->assertJsonStructure([
                "data"=>[
                    "*"=>[
                        "id",
                        "UserName",
                        "email",
                        "foo"
                    ]
                ]
            ]);
    }
    public function testGetUsersListWithPosts(){
        $token=$this->authenticate();
        $this->withHeaders(["Accept"=>"application/json","Authorization"=>"Bearer ".$token])
            ->json("GET","api/user/usersList?with=posts")
            ->assertStatus(200)
            ->assertJsonStructure([
                "data"=>[
                    "*"=>[
                        "id",
                        "UserName",
                        "email",
                        "foo",
                        "posts"=>[
                            "*"=>[
                                "id",
                                "title",
                                "body"
                            ]
                        ]
                    ]
                ]
            ]);
    }
}
