<?php

namespace Database\Seeders;

use App\Models\Pass;
use Illuminate\Database\Seeder;

class PassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 1; $i < 2000; $i++) {
            Pass::query()->create([
                'number' => $i,
            ]);
        }

    }
}
