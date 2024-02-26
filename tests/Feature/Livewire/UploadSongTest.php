<?php

namespace Tests\Feature\Livewire;

use App\Livewire\UploadSong;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UploadSongTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(UploadSong::class)
            ->assertStatus(200);
    }
}
