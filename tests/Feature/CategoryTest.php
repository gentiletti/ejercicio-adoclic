<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_categories_exist()
    {
        // Verificar si las categorías existen en la base de datos
        $this->assertDatabaseHas('categories', ['category' => 'Animals']);
        $this->assertDatabaseHas('categories', ['category' => 'Security']);
    }
}
