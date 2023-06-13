<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        $this->set_up();

        $userData = [
            'name' => 'Thameem',
            'email' => 'thameemansari2611@gmail.com',
            'password' => 'Test@123',
        ];
        $response = $this->post('api/register', $userData);
        $response->assertStatus(200);

        $loginData = [
            'email' => 'thameemansari2611@gmail.com',
            'password' => 'Test@123',
        ];
        $response = $this->post('api/login', $loginData);
        $response->assertStatus(200);
    }
}
