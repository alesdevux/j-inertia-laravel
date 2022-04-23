<?php

namespace Tests\Feature;

use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class NoteTest extends TestCase {
  use RefreshDatabase;

  public function test_note_view_has_notes() {
    $this->withExceptionHandling();

    User::factory()->create();
    $user = Auth::loginUsingId(1);
    $this->actingAs($user);

    $notes = Note::factory()->create([
      'excerpt' => 'This is a test note',
      'content' => 'This is the content of the test note',
    ]);
    
    $response = $this->get('/notes', [$notes]);
    $response->assertStatus(200);
    $response->assertSee('This is a test note');
  }
}
