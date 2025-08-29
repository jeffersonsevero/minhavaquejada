<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
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

        if (! User::where('email', 'admin@gmail.com')->exists()) {
            User::query()
                ->create([
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => '123456',
                ]);

        }

    }
}
