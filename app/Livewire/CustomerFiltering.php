<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Component;

class CustomerFiltering extends Component
{
    public $customersearch = '';
    public function updatingSearch()
    {
        $this->resetPage(); // Reset to the first page when searching
    }

    public function render()
    {
        $customers = Customer::where('customer_id', 'like', "%{$this->customersearch}%")
            ->orWhere('customer_first_name', 'like', "%{$this->customersearch}%")
            ->orWhere('customer_second_name', 'like', "%{$this->customersearch}%")
            ->orWhere('customer_email', 'like', "%{$this->customersearch}%")
            ->orWhere('customer_phone', 'like', "%{$this->customersearch}%")
            ->orWhere('customer_firstline_address', 'like', "%{$this->customersearch}%")
            ->orWhere('customer_secondline_address', 'like', "%{$this->customersearch}%")
            ->orWhere('customer_postcode', 'like', "%{$this->customersearch}%")
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        return view('livewire.customer-filtering', compact('customers'));
    }
}
