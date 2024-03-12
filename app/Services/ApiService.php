<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
    public function fetchApiData()
    {
        $response = Http::get(env('API_URL') . '/entries');

        if ($response->successful()) {
            return $response->json();
        } else {
            return null;
        }
    }
}