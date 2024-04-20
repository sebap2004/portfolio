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
    public function renders_successfully()
    {
        $user = User::factory()->create([
            'username' => 'testuser',
            'password' => 'testpassword'
        ]);

        Livewire::actingAs($user)->test(EditProfile::class)
            ->assertHasNoErrors();
    }

    /** @test */
    public function edit_user_successfully()
    {
        $user = User::factory()->create([
            'username' => 'testuser',
            'password' => 'testpassword'
        ]);

        $response = Livewire::actingAs($user)->test(EditProfile::class, ['user' => $user])
            ->set('form.username', fake()->userName)
            ->set('form.password', 'secondpasswordtesting')
            ->call('edit');

        dump($response->errors()->toArray());
        $response->assertHasNoErrors();
    }
}
