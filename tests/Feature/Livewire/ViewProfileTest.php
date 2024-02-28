<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ViewProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ViewProfileTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ViewProfile::class)
            ->assertStatus(200);
    }
}
