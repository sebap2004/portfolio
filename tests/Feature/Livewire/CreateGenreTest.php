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
        $user = User::factory()->create(); // Creates a test user
        DB::table('admin')->insert([ // Makes the test user an admin by adding a link to it in the admin table
            'user_ID' => $user->id,
            'created_at' => null,
            'updated_at' => null,
        ]);
        $response = $this->actingAs($user)->get('/admin'); // Tries to access the admin page
        $response->assertStatus(200); // Test succeeds if response is OK (200)
    }

    /** @test */
    public function create_genre()
    {
        $user = User::factory()->create(); // Creates a user
        DB::table('admin')->insert([ // Makes the user an admin
            'user_ID' => $user->id,
            'created_at' => null,
            'updated_at' => null,
        ]);
        $response = Livewire::actingAs($user)->test(CreateGenre::class)
            ->set('genre_name', 'test genre')
            ->call('create'); // Calls the function to create a genre acting as the admin user.

        dump($response->errors()->toArray());
        $response->assertHasNoErrors(); // Test succeeds if no errors happen.
    }

    /** @test */
    public function renders_successfully() // Makes sure the test renders successfully
    {
        Livewire::test(CreateGenre::class)
            ->assertStatus(200);
    }
}
