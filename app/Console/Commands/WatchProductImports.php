<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class WatchProductImports extends Command
{
    protected $signature = 'watch:product-imports';
    protected $description = 'Watch for new product imports and process them';

    public function handle()
    {

        $products = Product::whereNull('processed')->get();

        foreach ($products as $product) {

            $product->addingExpense($product->price);

            // Mark the product as processed
            $product->processed = true;
            $product->save();
        }

        $this->info('Processed all new products.');
    }
}
