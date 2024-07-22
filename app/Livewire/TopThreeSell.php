<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class TopThreeSell extends Component
{
    public function render()
    {
        $topSellProducts = $this->getTopThree();
        return view('livewire.top-three-sell', compact('topSellProducts'));
    }

    public function getTopThree()
    {

        return Product::orderby('sell_count', 'desc')->take(3)->get();
    }
}
