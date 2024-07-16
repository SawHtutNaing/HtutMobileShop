<?php

namespace Database\Seeders;

use App\Models\Expense;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = Supplier::all();
        foreach ($suppliers as $supplier) {
            $product =   Product::create([
                'name' => $supplier->name,
                'category_id' => $supplier->category_id,
                'supplier_id' => $supplier->id,
                'price' => $supplier->price + 100000,
                'image' => $supplier->image,
                'promotion' => '5000',
                'storage_capacity' => $supplier->storage_capacity,
                'quantity' => '50'

            ]);
            $product->addingExpense($supplier->price);
        }
    }
}
