<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Animal;
use App\Models\User;

class AnimalTest extends TestCase
{
    /**
     * A basic feature test example.
     */

     public function test_species_op_id()
     {
         $user = User::factory()->create(['email' => 'test@test.nl', 'password' => bcrypt('geheim')]);

         $response = $this->actingAs($user)->get('api/species/1');
         $response->assertStatus(200);
         $response->assertJson(['name' => 'vogel']);

         $user->delete();
     }

     public function test_animal_op_id()
     {
         $user = User::factory()->create(['email' => 'test@test.nl', 'password' => bcrypt('geheim')]);

         $response = $this->actingAs($user)->get('api/animals/1');
         $response->assertStatus(200);
         $response->assertJson(['name' => 'kraai', 'species_id' => 1]);

         $user->delete();
     }

     public function test_insert_animal()
     {
         $user = User::factory()->create(['email' => 'test@test.nl', 'password' => bcrypt('geheim')]);

         $data = ['name' => 'Duif', 'species_id' => 1];
         $response = $this->actingAs($user)->json('POST', 'api/animals', $data);
         $this->assertDatabaseHas('animal', ['name' => 'Duif', 'species_id' => 1]);
         $response->assertStatus(201);
         $response->assertJson(['name' => 'Duif', 'species_id' => 1]);

         $user->delete();
     }

     public function test_delete_animal()
     {
         $user = User::factory()->create(['email' => 'test@test.nl', 'password' => bcrypt('geheim')]);

         $response = $this->actingAs($user)->delete('api/animals/5');
         $response->assertStatus(200);

         $user->delete();
     }

     public function test_delete_created_animal()
     {
         $user = User::factory()->create(['email' => 'test@test.nl', 'password' => bcrypt('geheim')]);
         $animal = Animal::create(['name' => 'papagaai', 'species_id' => 1]);

         $response = $this->actingAs($user)->delete('api/animals/' . $animal->id);
         $this->assertDatabaseMissing('animal', ['name' => 'papagaai']);
         $response->assertStatus(200);

         $user->delete();
     }
}
