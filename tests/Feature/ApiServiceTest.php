<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\ApiService;

class ApiServiceTest extends TestCase
{
    public function test_it_can_fetch_entries_from_external_api()
    {
        $service = new ApiService();
        $apiData = $service->fetchApiData();

        $this->assertNotEmpty($apiData);
    }
}
