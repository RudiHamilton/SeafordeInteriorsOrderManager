<x-layout>
    <h1>View Orders</h1>
    <table>
        <thead>
            {{-- This will be swapped out for cards in the future just testing currently --}}
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Product ID</th>
            <th>Order Payment Type</th>
            <th>Order Quantity</th>
            <th>Order Gross Profit</th>
            <th>Order Net Profit</th>
            <th>Order Cost To Make</th>
            <th>Order Complete?</th>
            <th>Order Placed Date</th>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{$order->order_id}}</td>
                <td>{{$order->customer_id}}</td>
                <td>{{$order->product_id}}</td>
                <td>{{$order->order_payment_type}}</td>
                <td>{{$order->order_quantity}}</td>
                <td>{{$order->order_profit}}</td>
                <td>{{$order->order_net_profit}}</td>
                <td>{{$order->order_cost_to_make}}</td>
                <td>{{$order->order_complete}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <form method="POST" action="{{route('editorder',$order->order_id,$order->customer_id,$order->produt_id)}}">
                        @csrf
                        @method('GET')
                        <button type="submit">&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
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