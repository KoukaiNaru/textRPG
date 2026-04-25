<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recipes')->insert([
            ['item_id' => 5, 'ingredient_id' => 1, 'quantity' => 1],
            ['item_id' => 5, 'ingredient_id' => 2, 'quantity' => 3],
            ['item_id' => 4, 'ingredient_id' => 1, 'quantity' => 3]
        ]);
    }
}
