<?php

namespace Tests\Feature\Livewire;

use App\Livewire\LoginUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LoginUserTest extends TestCase
{
    /** @test  */
    public function render_successfully() // Makes sure the test renders successfully
    {
        Livewire::test(LoginUser::class)
            ->assertStatus(200);
    }

    /** @test */
    public function login_successfully() // Makes sure users can login correctly.
    {
        User::factory()->create([
            'username' => 'testuser',
            'password' => 'testpassword'
        ]); // Create user with predetermined parameters

        $response = Livewire::test(LoginUser::class) // Goes to the login page
            ->set('form.username', 'testuser') // Enter the username into the user box
            ->set('form.password', 'testpassword') // Enter the password into the password box
            ->call('login'); // Attempts to log in

        dump($response->errors()->toArray());
        $response->assertHasNoErrors(); // Test succeeds if no errors are presented.
    }
}
