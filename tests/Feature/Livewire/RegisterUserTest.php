<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Forms\UserForm;
use App\Livewire\RegisterUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    /** @test */
    public function create_account_successfully()
    {
        Livewire::test(RegisterUser::class)->assertStatus(200);

        $response = Livewire::test(RegisterUser::class)
            ->set('form.name', fake()->name)
            ->set('form.username', fake()->userName)
            ->set('form.email', fake()->email)
            ->set('form.password', fake()->password)
            ->set('form.agreesToTOS', true)
            ->call('register');

        dump($response->errors()->toArray()); // Dump errors
        $response->assertHasNoErrors();
    }
}
