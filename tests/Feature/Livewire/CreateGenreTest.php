<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CreateGenre;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;
use Tests\TestCase;
use function Symfony\Component\String\u;

class CreateGenreTest extends TestCase
{
    /** @test */
    public function allow_access_to_admin()
    {
        $user = User::factory()->create();
        DB::table('admin')->insert([
            'user_ID' => $user->id,
            'created_at' => null,
            'updated_at' => null,
        ]);
        $response = $this->actingAs($user)->get('/admin/newgenre');
        $response->assertStatus(200);
    }

    /** @test */
    public function create_genre()
    {
        $user = User::factory()->create();
        DB::table('admin')->insert([
            'user_ID' => $user->id,
            'created_at' => null,
            'updated_at' => null,
        ]);
        $response = Livewire::actingAs($user)->test(CreateGenre::class)
            ->set('genre_name', 'test genre')
            ->call('create');

        dump($response->errors()->toArray());
        $response->assertHasNoErrors();
    }

    /** @test */
    public function renders_successfully()
    {
        Livewire::test(CreateGenre::class)
            ->assertStatus(200);
    }
}
