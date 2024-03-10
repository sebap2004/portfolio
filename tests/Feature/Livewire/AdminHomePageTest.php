<?php

namespace Tests\Feature\Livewire;

use App\Livewire\AdminHomePage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AdminHomePageTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AdminHomePage::class)
            ->assertStatus(200);
    }
}
