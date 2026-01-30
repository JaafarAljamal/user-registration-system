<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UserProfileRelationshipTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    /**
     * Test if the User model has a relationship with the Profile model. 
     * @return void
     */
    public function test_a_user_can_have_a_profile(): void
    {
        // Arrange: Create a new user instance
        $user = new \App\Models\User();

        // Act & Assert: Check if the 'profile' method exists on the User model
        $this->assertTrue(
            method_exists($user, 'profile'),
            'The User model does not have a profile relationship method'
        );
    }
}
