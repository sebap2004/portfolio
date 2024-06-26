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
    /** @test  */
    public function render_successfully() // Makes sure the test renders successfully
    {
        Livewire::test(RegisterUser::class)->assertStatus(200);
    }

    /** @test */
    public function create_account_successfully() // Makes sure users can register correctly.
    {
        $response = Livewire::test(RegisterUser::class) // Sets form data to random fake user data
            ->set('form.name', "Test Name")
            ->set('form.username', "fake_username_test".fake()->biasedNumberBetween)
            ->set('form.email', fake()->colorName . "@uni.worc.ac.uk") // Registered user must be a uni student.
            ->set('form.password', "fakepasswordtesting")
            ->set('form.agreesToTOS', true)
            ->call('register'); // Calls the register function to make a user

        dump($response->errors()->toArray()); // Dump errors

        $response->assertHasNoErrors(); // Test succeeds if no errors are presented.
    }
}
