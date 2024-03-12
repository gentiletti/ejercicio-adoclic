<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Models\Entity;
use App\Models\Category;
use App\Http\Resources\EntityResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function fetchAndSaveEntities()
    {
        $apiData = $this->apiService->fetchApiData();

        if ($apiData) {

            foreach ($apiData['entries'] as $entry) {
                // Busca la categoría por nombre
                $category = Category::where('category', $entry['Category'])->first();
                $existingEntity = Entity::where('link', $entry['Link'])->first();

                // Verificar si la categoría existe y si no está creado anteriormente
                if ($category !== null && !$existingEntity) {

                    // Crear una nueva entidad en la base de datos
                    Entity::create([
                        'api' => $entry['API'],
                        'description' => $entry['Description'],
                        'link' => $entry['Link'],
                        'category_id' => $category->id
                    ]);
                }
            }

            return response()->json(['success' => true, 'message' => 'Entidades obtenidas y guardadas exitosamente'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'No se pudieron recuperar entidades de la API'], 500);
        }
    }

    public function getDataByCategory($category)
    {
        try {

            $category = Category::where('category', $category)->first();
            if (!$category) {
                throw new ModelNotFoundException('Category not found');
            }

            $entities = Entity::whereHas('category', function ($query) use ($category) {
                $query->where('category', $category);
            })->get();

            return response()->json([
                'success' => true,
                'data' => EntityResource::collection($entities)
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }
    }
}
