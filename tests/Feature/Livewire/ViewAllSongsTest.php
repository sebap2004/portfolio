<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ViewSongs;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ViewAllSongsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ViewSongs::class)
            ->assertStatus(200);
    }
}
