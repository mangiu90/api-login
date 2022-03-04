<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Category::factory(10)->create();

        DB::table('categories')->insert([
            ['name' => 'Impuesto'],
            ['name' => 'Alquiler'],
            ['name' => 'Comida'],
            ['name' => 'Ocio'],
            ['name' => 'Varios'],
        ]);
    }
}
