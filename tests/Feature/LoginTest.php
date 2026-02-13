<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
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
}
