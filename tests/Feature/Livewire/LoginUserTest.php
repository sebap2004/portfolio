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
    public function render_successfully()
    {
        Livewire::test(LoginUser::class)
            ->assertStatus(200);
    }

    /** @test */
    public function login_successfully()
    {
        User::factory()->create([
            'username' => 'testuser',
            'password' => 'testpassword'
        ]);

        $response = Livewire::test(LoginUser::class)
            ->set('form.username', 'testuser')
            ->set('form.password', 'testpassword')
            ->call('login');

        dump($response->errors()->toArray());
        $response->assertHasNoErrors();
    }
}
