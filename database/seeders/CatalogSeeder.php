<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [

            ['name' => 'Дерево', 'type' => 'resource', 'power' => 0],
            ['name' => 'Камень', 'type' => 'resource', 'power' => 0],
            ['name' => 'Железо', 'type' => 'resource', 'power' => 0],

            ['name' => 'Дубина', 'type' => 'weapon', 'power' => 15],
            ['name' => 'Каменный нож', 'type' => 'weapon', 'power' => 25],
        ];
        foreach ($items as $item) {
            Catalog::firstOrCreate(
                ['name' => $item['name']],
                ['type' => $item['type'],
                    'power' => $item['power']]);
        }
    }
}
