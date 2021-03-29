<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testInvalidDataLogin()
    {
        $this->withHeaders(["Accept" => "application/json"])
            ->json("POST", "api/loginApi", [])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "username" => [
                        "The username field is required."
                    ],
                    "password" => [
                        "The password field is required."
                    ]
                ]
            ]);
    }
    public function testNotFoundUserLogin()
    {
        $email ="test@gmail.com";
        $password = Config::get("api.apiPassword");
        $this->withHeaders(["Accept" => "application/json"])
            ->json("POST", "api/loginApi", ["username"=>$email,"password"=>$password])
            ->assertStatus(401)
            ->assertJson([
                'error' => 'اطلاعات کاربری اشتباه وارد شده است'
            ]);
    }
    public function testLogin()
    {
        $email =Config::get("api.apiEmail");
        $password = Config::get("api.apiPassword");
        $this->withHeaders(["Accept" => "application/json"])
            ->json("POST", "api/loginApi", ["username"=>$email,"password"=>$password])
            ->assertStatus(200)
            ->assertJsonStructure([
                'token',
            ]);
    }
}
