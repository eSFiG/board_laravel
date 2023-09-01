<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['id' => 1, 'name' => 'open'],
            ['id' => 2, 'name' => 'in progress'],
            ['id' => 3, 'name' => 'finished']
        ];
        DB::table('statuses')->insert($statuses);
    }
}
