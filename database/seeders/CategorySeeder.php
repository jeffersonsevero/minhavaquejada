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
                'name' => 'Feminino',
                'price' => 50,
            ],
            [
                'name' => 'Profissional',
                'price' => 150,
            ],
            [
                'name' => 'Iniciante',
                'price' => 100,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
