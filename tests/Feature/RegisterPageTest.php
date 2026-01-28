<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class RegisterPageTest
 * This class handles feature tests for the user registration process.
 */
class RegisterPageTest extends TestCase
{
    /**
     * Test if the registration page returns a successful response.
     *
     * @return void
     */
    public function test_register_page_is_accessible(): void
    {
        // Act: Visit the registration route
        $response = $this->get('/register');

        // Assert: Check if status is OK and the heading is visible
        $response->assertStatus(200);
        $response->assertSee('Register');
    }

    /**
     * Test if all necessary input fields are rendered on the registration page.
     *
     * @return void
     */
    public function test_register_page_fields_are_visible(): void
    {
        // Act: Visit the registration route
        $response = $this->get('/register');

        // Assert: Verify visibility of essential form labels/fields
        $response->assertSee('Name');
        $response->assertSee('Email');
        $response->assertSee('Password');
        $response->assertSee('Register');
    }

    use RefreshDatabase;
    /**
     * Test if a user can successfully register with valid data.
     *
     * @return void
     */
    public function test_user_can_register(): void
    {
        // Act: Submit the registration form with user data
        $response = $this->post('/register', [
            'username' => 'Jaafar',
            'email' => 'jaafar@example.com',
            'password' => 'secret123'
        ]);

        // Assert: Verify redirection (successful submission)
        $response->assertStatus(302);
        // Assert: Check if the user record exists in the database
        $this->assertDatabaseHas('users', [
            'email' => 'jaafar@example.com'
        ]);
    }

    /**
     * Test if the invalid Email and password values will report errors.
     *
     * @return void
     */
    public function test_registration_requires_valid_email_and_password(): void
    {
        // Insert an invalid Email and a short password for testing
        $response = $this->post('/register', [
            'username' => 'Jaafar',
            'email' => 'not-an-email',
            'password' => 'short'
        ]);

        // Assertion that errors will be returned in these fields
        $response->assertSessionHasErrors('email', 'password');
    }
}
