<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class DevTest extends TestCase
{
    /*
     * A basic unit test example.
     *
     * @return void
     */

    // use WithoutMiddleware;
    use RefreshDatabase;

    /** dev route  @test */
    public function devRoute()
    {
        $this->withoutMiddleware();
        $this->get('/dev')->assertStatus(200);
    }

    /** notification  @test */
    public function notificationRoute()
    {
        $this->withoutMiddleware();
        $this->get('/dev/create')->assertStatus(200);
    }

    /* store  @test */
    // public function storeDev()
    // {
    //     // $this->withoutMiddleware();
    //     $value = [
    //         'name' => 'Test',
    //     ];

    //     $this->post(route('store'), $value)->assertStatus(201)->assertJson($value);
    // }
}
