<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test: Verify that the login page is accessible.
     */
    public function test_login_page_is_accessible(): void
    {
        // Act: Send a GET request to the login route
        $response = $this->get('/login');

        // Assert: Verify that the response status is 200 (OK)
        $response->assertStatus(200);
    }

    /**
     * Test: Ensure that a user can successfully log in with valid credentials.
     * 
     * @return viod
     */
    public function test_user_can_login_with_correct_credentials(): void
    {
        // Arrange: Create a test user with password
        $user = User::create([
            'username' => 'TestUser',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
        // Act: Attempt to login
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);
        // Assert: Validate the redirection, and the user is registerd
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test: Ensure that a user cannot log in with an incorrect password.
     * 
     * @return void
     */
    public function test_user_cannot_login_with_incorrect_password(): void
    {
        // Arrange: Create a user
        $user = User::created([
            'username' => 'WrongPassUser',
            'email' => 'wrong@example.com',
            'password' => bcrypt('correct123'),
        ]);

        // Act: Attempt to login via incorrect password
        $response = $this->post('/login', [
            'email' => 'wrong@example.com',
            'password' => 'wrong_password',
        ]);

        // Assert: Validate staying on the login page with session errors
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}
