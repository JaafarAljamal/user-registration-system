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

        // Act: Update the profile via relationship
        $user->profile()->update([
            'bio' => 'Software Engineer',
        ]);

        // Assert: Refresh the log then verify the state and the updated value
        $user->refresh();
        $this->assertNotNull($user->profile);
        $this->assertEquals('Software Engineer', $user->profile->bio);
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
    public function test_user_can_view_their_profile_page(): void
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

    /**
     * Test that users can update their profile bio.
     *
     * @return void
     */
    public function test_user_can_update_their_bio(): void
    {
        // Arrange: Create a user with a profile
        $user = \App\Models\User::create([
            'username' => 'Jaafar',
            'email' => 'jaafar@example.com',
            'password' => 'secret123',
        ]);
        $newBio = 'I am a professional web developer';

        // Act: Send an update request (PATCH) with bio data as an array
        $response = $this->actingAs($user)->patch('/profile', [
            'bio' => $newBio,
        ]);

        // Assert: Validate changes via successfully redirect and update database
        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id,
            'bio' => $newBio,
        ]);
    }

    /**
     * Test guests cannot view the profile page.
     * 
     * @return void
     */
    public function test_guests_cannot_view_profile_page(): void
    {
        // Act: Attempt to enter the profile page without login
        $response = $this->get('/profile');

        // Assert: Validate that the user is directed to the login page
        $response->assertRedirect('/login');
    }
}
