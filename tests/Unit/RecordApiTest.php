<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Record;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

class RecordApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_all_records()
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        Record::factory()->count(3)->create(['name' => 'Test Record']);

        $response = $this->withHeader('Authorization', "Bearer $token")->getJson('/api/records');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_a_record()
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $response = $this->withHeader('Authorization', "Bearer $token")->postJson('/api/records', [
            'name' => 'Test Record',
            'description' => 'Test Description'
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'name' => 'Test Record',
            ]);
    }

    /** @test */
    public function it_can_show_a_record()
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $record = Record::factory()->create(['name' => 'Test Record']);

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->getJson('/api/records/' . $record->id);

        $response->assertStatus(200)
            ->assertJson([
                'name' => $record->name,
            ]);
    }

    /** @test */
    public function it_can_update_a_record()
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $record = Record::factory()->create(['name' => 'Test Record']);

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->putJson('/api/records/' . $record->id, [
                'name' => 'Updated Record',
                'description' => 'Updated Description'
            ]);

        $response->assertStatus(200)
            ->assertJson([
                'name' => 'Updated Record',
            ]);
    }

    /** @test */
    public function it_can_delete_a_record()
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $record = Record::factory()->create(['name' => 'Test Record']);

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->deleteJson('/api/records/' . $record->id);

        $response->assertStatus(204);
    }
}
