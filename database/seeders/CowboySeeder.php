<?php

namespace Database\Seeders;

use App\Models\Cowboy;
use Illuminate\Database\Seeder;

class CowboySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cowboy::factory()
            ->count(10)
            ->hasOwnedPasses(3)
            ->hasHelpedPasses(3)
            ->create();
    }
}
