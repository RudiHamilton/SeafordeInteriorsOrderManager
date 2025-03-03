<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductFiltering extends Component
{
    public $productsearch = '';
    public function updatingSearch()
    {
        $this->resetPage(); // Reset to the first page when searching
    }

    public function render()
    {
        $products = Product::where('product_id', 'like', "%{$this->productsearch}%")
            ->orWhere('product_name', 'like', "%{$this->productsearch}%")
            ->orWhere('product_price', 'like', "%{$this->productsearch}%")
            ->orWhere('product_cost_to_make', 'like', "%{$this->productsearch}%")
            ->orWhere('product_current_stock', 'like', "%{$this->productsearch}%")
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        return view('livewire.product-filtering', compact('products'));
    }
}
