<div>
    <input 
    type="text" 
    wire:model.live.debounce.300ms="productsearch" 
    placeholder="Search products..."
    class="border px-3 py-2 rounded w-full"
    />
    <table>
        <thead>
            {{-- This will be swapped out for cards in the future just testing currently --}}
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Price to Make</th>
            <th>Current Product Stock</th>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{$product->product_id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_price}}</td>
                <td>{{$product->product_cost_to_make}}</td>
                <td>{{$product->product_current_stock}}</td>
                <td>
                    <form method="POST" action="{{route('editproduct',$product->product_id)}}">
                        @csrf
                        @method('GET')
                        <button type="submit">&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
                    </form>
                    <form method="POST" action="{{ route('deleteproduct',$product->product_id) }}" onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5" class=" text-center">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div>
        {{$products->links('pagination::bootstrap-5')}}
    </div>
</div>
