<x-layout>
    <h1>View Orders</h1>
    <table>
        <thead>
            {{-- This will be swapped out for cards in the future just testing currently --}}
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Order Payment order_payment_type</th>
            <th>Order Complete?</th>
            <th>Order Placed</th>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{$order->order_id}}</td>
                <td>{{$order->customer_id}}</td>
                <td>{{$order->order_payment_type}}</td>
                <td>{{$order->order_complete}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <form method="POST" action="{{route('editorder',$order->order_id)}}">
                        @csrf
                        @method('GET')
                        <button type="submit">Edit</button>
                    </form>
                    <form method="POST" action="{{ route('deleteorder',$order->order_id) }}" onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</x-layout>