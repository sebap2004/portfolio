<?php

namespace Tests\Feature\Livewire;

use App\Livewire\AdminHomePage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;
use Tests\TestCase;
use function Symfony\Component\String\u;

class AdminHomePageTest extends TestCase
{
    /** @test */
    public function deny_access_to_nonadmin()
    {
        $user = User::factory()->create(); // Creates a test user with no admin privileges
        $response = $this->actingAs($user)->get('/admin'); // Tries to access the admin page
        $response->assertStatus(403); // Test succeeds if the user gets redirected.
    }


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
    public function renders_successfully() // Makes sure the page renders correctly.
    {
        $user = User::factory()->create(); // Creates a test user
        DB::table('admin')->insert([ // Makes the test user an admin by adding a link to it in the admin table
            'user_ID' => $user->id,
            'created_at' => null,
            'updated_at' => null,
        ]);
        Livewire::actingAs($user)->test(AdminHomePage::class)
            ->assertStatus(200);
    }
}
