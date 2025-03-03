<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderFiltering extends Component
{
    public $ordersearch = '';
    public function updatingSearch()
    {
        $this->resetPage(); // Reset to the first page when searching
    }

    public function render()
    {
        $orders = Order::where('order_id', 'like', "%{$this->ordersearch}%")
            ->orWhere('customer_id', 'like', "%{$this->ordersearch}%")
            ->orWhere('product_id', 'like', "%{$this->ordersearch}%")
            ->orWhere('order_payment_type', 'like', "%{$this->ordersearch}%")
            ->orWhere('order_quantity', 'like', "%{$this->ordersearch}%")
            ->orWhere('order_profit', 'like', "%{$this->ordersearch}%")
            ->orWhere('order_net_profit', 'like', "%{$this->ordersearch}%")
            ->orWhere('order_cost_to_make', 'like', "%{$this->ordersearch}%")
            ->orWhere('order_complete', 'like', "%{$this->ordersearch}%")
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        return view('livewire.order-filtering', compact('orders'));
    }
}
