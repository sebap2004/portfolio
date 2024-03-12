<?php

namespace Tests\Feature\Livewire;

use App\Livewire\AdminManageUsers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AdminManageUsersTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AdminManageUsers::class)
            ->assertStatus(200);
    }
}
