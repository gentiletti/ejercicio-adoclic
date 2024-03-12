<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class Entity extends Model
{
    use HasFactory;

    protected $fillable = ['api', 'description', 'link', 'category_id'];

    // Relación con la categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static $rules = [
        'api' => 'required|string|max:255',
    ];
    
}
