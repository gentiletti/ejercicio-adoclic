<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    public function test_it_returns_data_for_valid_category()
    {
        $response = $this->get('/api/Animals');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'success',
                     'data' => [
                         '*' => [
                             'api',
                             'description',
                             'link',
                             'category' => [
                                 'id',
                                 'category'
                             ]
                         ]
                     ]
                 ]);
    }

    public function test_it_handles_error_for_invalid_category()
    {
        $response = $this->get('/api/Category3');

        $response->assertStatus(404)
                 ->assertJson([
                     'success' => false,
                     'message' => 'Category not found'
                 ]);
    }
}
