<span>
    <input 
    type="text" 
    wire:model.live.debounce.300ms="customersearch" 
    placeholder="Search customers..."
    class="border px-3 py-2 rounded w-full"
    />
    </div>
    <table>
        <thead>
            {{-- This will be swapped out for cards in the future just testing currently --}}
            <th>Customer ID</th>
            <th>Customer First Name</th>
            <th>Customer Second Name</th>
            <th>Customer Email</th>
            <th>Customer Phone Number</th>
            <th>Customer First Line Address</th>
            <th>Customer Second Line Address</th>
            <th>Customer Postcode</th>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
            <tr>
                <td>{{$customer->customer_id}}</td>
                <td>{{$customer->customer_first_name}}</td>
                <td>{{$customer->customer_second_name}}</td>
                <td>{{$customer->customer_email}}</td>
                <td>{{$customer->customer_phone}}</td>
                <td>{{$customer->customer_firstline_address}}</td>
                <td>{{$customer->customer_secondline_address}}</td>
                <td>{{$customer->customer_postcode}}</td>
                <td>
                    <form method="POST" action="{{route('editcustomer',$customer->customer_id)}}">
                        @csrf
                        @method('GET')
                        <button type="submit">&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
                    </form>
                    <form method="POST" action="{{ route('deletecustomer',$customer->customer_id) }}" onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5" class=" text-center">No customers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div>
        {{$customers->links('pagination::bootstrap-5')}}
    </div>
</span>