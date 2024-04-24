<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ViewSongs;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use function Symfony\Component\String\u;

class ViewSongsTest extends TestCase
{
    /** @test */
    public function renders_successfully() // Makes sure the test renders successfully
    {
        $user = User::factory()->create();
        Livewire::actingAs($user)->test(ViewSongs::class)
            ->assertStatus(200);
    }

    public function test_no_access_to_guests() // Makes sure non-logged-in users can't access the app
    {
        $response = $this->get('/app'); // Tries to access the website
        $response->assertStatus(302); // Test succeeds if they are redirected.
    }

    public function test_access_to_registered_users() // Makes sure logged-in users can access the app
    {
        $user = User::factory()->create(); // Creates a user
        $response = $this->actingAs($user)->get('/app'); // Tries to access the website acting as the user
        $response->assertStatus(200); // Test succeeds if they are able to access the website.
    }
}
