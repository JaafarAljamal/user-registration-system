<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserProfileRelationshipTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test that a user can be associated with a profile.
     *
     * @return void
     */
    public function test_a_user_can_have_a_profile(): void
    {
        // Arrange: Create a user and a profile in the datatbase
        $user = \App\Models\User::create([
            'username' => 'Jaafar',
            'email' => 'jaafar@example.com',
            'password' => 'secret123',
        ]);
        $profile = \App\Models\Profile::create([
            'user_id' => $user->id,
            'bio' => 'Software Engineer',
        ]);

        // Act: retrieve profile via relationship
        $retrievedProfile = $user->profile;

        // Assert: verify type and expected data
        $this->assertInstanceOf(\App\Models\Profile::class, $retrievedProfile);
        $this->assertEquals('Software Engineer', $retrievedProfile->bio);
        $this->assertEquals($user->id, $profile->user->id);
    }

    /**
     * Test cascade delete for user profile.
     *
     * @return void
     */
    public function test_profile_is_deleted_when_user_is_deleted(): void
    {
        // Arrange: Create a user and its profile will be created automatically
        $user = \App\Models\User::create([
            'username' => 'Jaafar',
            'email' => 'jaafar@example.com',
            'password' => 'secret123',
        ]);

        // Act: Delete the created user
        $user->delete();

        // Assert: Validate that the associated profile has deleted
        $this->assertDatabaseMissing('profiles', ['user_id' => $user->id]);
    }

    /**
     * Test that users can view their profile page.
     *
     * @return void
     */
    public function test_user_can_view_thier_profile_page(): void
    {
        // Arrange: Create a user with a profile
        $user = \App\Models\User::create([
            'username' => 'Jaafar',
            'email' => 'jaafar@example.com',
            'password' => 'secret123',
        ]);

        // Act: Visit the profile as a user
        $response = $this->actingAs($user)->get('/profile');

        // Assert: Validate the HTTP status (200 Found) and the data is visible
        $response->assertStatus(200);
        $response->assertSee('Jaafar');
        $response->assertSee('jaafar@example.com');
    }
}
