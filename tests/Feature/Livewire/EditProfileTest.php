<?php

namespace Tests\Feature\Livewire;

use App\Livewire\EditProfile;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class EditProfileTest extends TestCase
{
    /** @test */
    public function renders_successfully() // Makes sure the test renders successfully
    {
        $user = User::factory()->create([
            'username' => 'testuser',
            'password' => 'testpassword'
        ]);

        Livewire::actingAs($user)->test(EditProfile::class)
            ->assertHasNoErrors();
    }

    /** @test */
    public function edit_user_successfully() // Makes sure editing user data works.
    {
        $user = User::factory()->create([
            'username' => fake()->userName,
            'password' => 'test password'
        ]); // creates a new user with preset username and password

        Artist::factory()->create([ // Creates a new artist and links it to the user
            'user_ID' => $user->id
        ]);

        $response = Livewire::actingAs($user)->test(EditProfile::class, ['user' => $user])
            ->set('form.username', 'testuser_the2nd'.fake()->biasedNumberBetween) // Changes username
            ->set('form.password', 'secondpasswordtesting'.fake()->biasedNumberBetween) // Changes password
            ->call('edit'); // Calls the method to edit the user data
        dump($response->errors()->toArray());
        $response->assertHasNoErrors(); // Test succeeds if no errors are presented.
    }
}
