<x-layout>
    <h1>View Products</h1>
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
            @foreach ($products as $product)
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
                        <button type="submit">Edit</button>
                    </form>
                    <form method="POST" action="{{ route('deleteproduct',$product->product_id) }}" onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</x-layout>