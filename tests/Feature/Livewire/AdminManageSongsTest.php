<?php

namespace Tests\Feature\Livewire;

use App\Livewire\AdminManageSongs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AdminManageSongsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AdminManageSongs::class)
            ->assertStatus(200);
    }
}
