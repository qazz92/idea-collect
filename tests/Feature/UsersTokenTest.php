<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UsersTokenTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_will_get_token()
    {
        $user = factory(User::class, 1)->create();

        $this->artisan('passport:install');

        $response = $this->post(route('api.user.token'), [
            'id' => $user->first()->id,
        ]);

        $response->assertJsonStructure([
            'code',
            'token'
        ]);
    }
}
