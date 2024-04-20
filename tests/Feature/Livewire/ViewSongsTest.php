<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ViewSongs;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use function Symfony\Component\String\u;

class ViewSongsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        $user = User::factory()->create();
        Livewire::actingAs($user)->test(ViewSongs::class)
            ->assertStatus(200);
    }

    public function test_no_access_to_guests()
    {
        $response = $this->get('/app');
        $response->assertStatus(302);
    }

    public function test_access_to_registered_users()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/app');
        $response->assertStatus(200);
    }
}
