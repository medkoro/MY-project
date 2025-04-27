<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Animaux',
                'description' => 'Contenu éducatif sur les animaux'
            ],
            [
                'name' => 'Couleurs',
                'description' => 'Contenu éducatif sur les couleurs'
            ],
            [
                'name' => 'Nombres',
                'description' => 'Contenu éducatif sur les nombres'
            ],
            [
                'name' => 'Légumes',
                'description' => 'Contenu éducatif sur les légumes'
            ],
            [
                'name' => 'Transport',
                'description' => 'Contenu éducatif sur les moyens de transport'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
