<?php

namespace Tests\Feature\Livewire;

use App\Livewire\EditProfile;
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
            'username' => 'testuser',
            'password' => 'testpassword'
        ]); // creates a new user with preset username and password

        $response = Livewire::actingAs($user)->test(EditProfile::class, ['user' => $user])
            ->set('form.username', fake()->userName) // Changes username
            ->set('form.password', 'secondpasswordtesting') // Changes password
            ->call('edit'); // Calls the method to edit the user data

        dump($response->errors()->toArray());
        $response->assertHasNoErrors(); // Test succeeds if no errors are presented.
    }
}
