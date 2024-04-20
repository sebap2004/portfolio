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
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/admin');
        $response->assertStatus(403);
    }


    /** @test */
    public function allow_access_to_admin()
    {
        $user = User::factory()->create();
        DB::table('admin')->insert([
            'user_ID' => $user->id,
            'created_at' => null,
            'updated_at' => null,
        ]);
        $response = $this->actingAs($user)->get('/admin');
        $response->assertStatus(200);
    }
}
