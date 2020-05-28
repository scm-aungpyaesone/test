<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Laravel\Passport\Passport;

class AuthTest extends TestCase
{
  /**
   * This is to refresh database after running tests.
   */
  use RefreshDatabase;

  /**
   * This is to setup initial functions before starting test cases.
   * @return void
   */
  public function setup(): void
  {
    parent::setUp();
    $this->user = Passport::actingAs(
      factory(User::class)->create()
    );
  }

  /**
   * This is to tear down functions after running test cases.
   * @return void
   */
  public function tearDown(): void
  {
    parent::tearDown();
  }

  /**
   * This is to test auth user api.
   * 
   * Expection is to response 200 status.
   * @return void
   */
  public function testAuthUser()
  {
    // execute
    $response = $this->get(route('api.user'));

    // expect
    $response->assertStatus(200);
  }
}
