<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use Illuminate\Support\Str;

class CategoriaFactory extends Factory
{
    
    public function definition()
    {
        return [
            'categoria'=>$this->faker->name()
        ];
    }
}