<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class DashboardController extends Controller
{
    //this is where all of the dashboard logic is held this will show all the metrics the user will need
    //total orders all time
    public function orderCount(){
        $totalOrders = Order::count();
        return $totalOrders;
    }
    //total revenue all time
    public function totalRevenue(){
        $totalRevenue = Order::sum('order_profit');
        return $totalRevenue;
    }
    //total net profit all time
    public function totalNetProfit(){
        $totalNetProfit = Order::sum('order_net_profit');
        return $totalNetProfit;
    }
    //all of completed orders
    public function completedOrders(){
        $completedOrders = Order::where('order_complete', 1)->count();
        return $completedOrders;
    }
    //all of the pending orders
    public function pendingOrders(){
        $pendingOrders = Order::where('order_complete', 0)->count();
        return $pendingOrders;
    }
    //total cost of all items
    public function totalCost(){
        $totalCost = Order::sum('order_cost_to_make');
        return $totalCost;
    }
    public function totalCandles(){
        $amountOfCandles = Order::sum('order_quantity');
        return $amountOfCandles;
    }
    //best selling product
    public function bestSelling(){
        $bestSellingProduct = Order::selectRaw('product_id, SUM(order_quantity) as total_sold')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->first();
        return $bestSellingProduct;
    }
    //most profitable product
    public function mostProfitableProduct(){
        $mostProfitableProduct = Order::selectRaw('product_id, SUM(order_net_profit) as total_profit')
            ->groupBy('product_id')
            ->orderByDesc('total_profit')
            ->first();
        return $mostProfitableProduct;
    }
    // the last 10 orders done
    public function last10Orderss(){
        $recentOrders = Order::latest()->take(10)->get();
        return $recentOrders;
    }
    public function profitPerItem(){
        $profitPerItem = Order::selectRaw('product_id, SUM(order_net_profit) as total_profit')
            ->groupBy('product_id')
            ->orderByDesc('total_profit')
            ->get();
        return $profitPerItem;
    }
    //returns all the stats as an array
    public function returnAllStats(){
        return [
            'order_count' => $this->orderCount(),
            'total_revenue' => $this->totalRevenue(),
            'total_net_profit' => $this->totalNetProfit(),
            'completed_orders'=> $this->completedOrders(),
            'pending_orders' => $this->pendingOrders(),
            'total_cost' => $this->totalCost(),
            'total_candles'=>$this->totalCandles(),
            'best_selling_product' => $this->bestSelling(),
            'most_profitable_product' => $this->mostProfitableProduct(),
            'last_10_orders' => $this->last10Orderss(),
            'profit_per_item' => $this->profitPerItem()
        ];
    }
    public function viewAllStats(){
        $stats = $this->returnAllStats();
        return view('/usedpages/dashboard', compact('stats',));
    }
}
