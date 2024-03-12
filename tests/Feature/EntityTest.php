<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entity;

class EntityTest extends TestCase
{
    /*public function test_entity_can_be_created()
    {
        $entity = Entity::factory()->create([
            'api' => 'Test API',
            'description' => 'Test description',
            'link' => 'http://example.com',
            'category_id' => 1
        ]);

        $this->assertInstanceOf(Entity::class, $entity);
        $this->assertEquals('Test API', $entity->api);
        $this->assertEquals('Test description', $entity->description);
        $this->assertEquals('http://example.com', $entity->link);
        $this->assertEquals(1, $entity->category_id);
    }*/

    public function test_api_field_is_required()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Entity::factory()->create([
            'api' => '',
            'description' => 'Test description',
            'link' => 'https://example.com',
            'category_id' => 1
        ]);
    }

    public function test_category_id_must_be_integer()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Entity::factory()->create([
            'api' => 'Test' . rand(),
            'description' => 'Test description',
            'link' => 'https://example.com',
            'category_id' => 'not_an_integer'
        ]);
    }
}
