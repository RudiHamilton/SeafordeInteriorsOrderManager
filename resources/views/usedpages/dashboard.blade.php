<x-layout>
    <head>
        <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h1>Seaforde Interiors Dashboard</h1></div>
            <div class="card-body">
                <div class="row">
                    <!-- Total Orders -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Orders</h5>
                                <p class="card-text">Total Orders: {{ $stats['order_count']}}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Total Candles Ordered: {{ $stats['total_candles']}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Total Revenue -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Gross Profit</h5>
                                <p class="card-text">£{{ number_format($stats['total_revenue'], 2) }}</p>
                            </div>
                        </div>
                    </div>
            <br>
                    <!-- Total Net Profit -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Net Profit</h5>
                                <p class="card-text">£{{ number_format($stats['total_net_profit'], 2) }}</p>
                            </div>
                        </div>
                    </div>
                    <br><br><br><br>
                    <!-- Total Costs -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Costs</h5>
                                <p class="card-text">£{{ number_format($stats['total_cost'], 2) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Completed vs Pending orders</h5>
                                <p class="card-text">
                                    Completed Orders: {{ $stats['completed_orders'] }}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Pending Orders: {{$stats['pending_orders']}}
                                    <canvas id="pie"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Profit per product</h5>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            

                <div class="row mt-4">
                    <!-- Best Selling Product -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Best Selling Product</h5>
                                <p class="card-text">
                                    Product ID: {{ $stats['best_selling_product']['product_id'] }} <br>
                                    Total Sold: {{ $stats['best_selling_product']['total_sold'] }}
                                </p>
                            </div>
                        </div>
                    </div>
            
                    <!-- Most Profitable Product -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Most Profitable Product</h5>
                                <p class="card-text">
                                    Product ID: {{ $stats['most_profitable_product']['product_id'] }} <br>
                                    Total Profit: £{{ number_format($stats['most_profitable_product']['total_profit'], 2) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Orders -->
                <div class="mt-4">
                    <h2>Last 10 Orders</h2> 
                    <form action="/usedpages/vieworders">
                    <button h>View Orders</button>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer ID</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Edit Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stats['last_10_orders'] as $order)
                                <tr>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ $order->customer_id }}</td>
                                    <td>{{ $order->order_quantity }}</td>
                                    <td>£{{ number_format($order->order_profit, 2) }}</td>
                                    <td>
                                        <form method="POST" action="{{route('editorder',$order->order_id)}}">
                                            @csrf
                                            @method('GET')
                                            <button type="submit">Edit</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [],
          borderWidth: 1
          
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
  <script>
    const pies = document.getElementById('pie');
  
    new Chart(pies, {
      type: 'pie',
      data: {
        labels: ['Completed', 'Pending'],
        datasets: [{
            label: 'Completed vs Pending',
            data: [{{ $stats['completed_orders'] }}, 
                    {{ $stats['pending_orders'] }}],
            borderWidth: 1,
            backgroundColor: [
                'rgb(85, 107, 47)',
                'rgb(211, 211, 211)',
            ],

        }]
      },
    });
  </script>
</x-layout>