<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    public function run(): void
    {
        $priorities = [
            ['id' => 1, 'name' => 'low'],
            ['id' => 2, 'name' => 'medium'],
            ['id' => 3, 'name' => 'high'],
            ['id' => 4, 'name' => 'highest']
        ];
        DB::table('priorities')->insert($priorities);
    }
}
