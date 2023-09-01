<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['id' => 1, 'name' => 'bug'],
            ['id' => 2, 'name' => 'task'],
            ['id' => 3, 'name' => 'story']
        ];
        DB::table('types')->insert($types);
    }
}
