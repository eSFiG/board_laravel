<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InitiateSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PrioritySeeder::class,
            TypeSeeder::class,
            StatusSeeder::class
        ]);
    }
}
