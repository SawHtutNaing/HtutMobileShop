<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $phoneBrands = [
            ['name' => 'Apple'],
            ['name' => 'Samsung'],
            ['name' => 'Huawei'],
            ['name' => 'Xiaomi'],
            ['name' => 'Oppo'],
            ['name' => 'Vivo'],
            ['name' => 'OnePlus'],
            ['name' => 'Nokia'],
            ['name' => 'Sony'],
            ['name' => 'LG'],
        ];



        // Category::insert($phoneBrands);
        // DB::table('categories')->insert($phoneBrands);
        foreach ($phoneBrands as $key => $value) {
            Category::create(['name' => $value['name']]);
        }
    }
}
