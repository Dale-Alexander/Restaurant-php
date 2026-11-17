<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Enums\PaymentStatus;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Allow ?per_page=…, but clamp it so nobody can request 100k rows.
        $perPage = min(max((int) $request->query('per_page', 20), 1), 100);
        //$request->query('per_page', 20) Looks for ?per_page=... in the URL. If it isnt present, it defaults to 20
        //(int): Casts the input to an integer("50" becomes 50 and garbage text like "abc" becomes 0)
        //max(..., 1) enforces a minimum of 1 because someone might pass ?perpage=0 or ?perpage=-10
        //min(enforces a minimum so users cant exceed 100 rows)

        $orders = Order::select('id', 'user_id', 'status', 'total', 'discount','subtotal', 'tax', 'created_at, dining_table_id')
            ->with([
                'orderItems:id,order_id,price_snapshot,name_snapshot,quantity',
                'payments:id,order_id,amount,payment_method,status',
                'user:id,first_name,last_name,phone',
                'diningTable:id, number'
            ])
            ->latest()
            ->paginate($perPage)   // reads ?page= from the request automatically
            ->withQueryString();   // keeps ?per_page / filters in the page links
        $revenue = Payment::where('status', PaymentStatus::SUCCEEDED)->sum('amount');
        $counts = Order::selectRaw('status, COUNT(*) as total')->groupBy('status')->pluck('total', 'status');// ['Pending' => 4, 'Served' => 31, ...]

        return view('admin.orders.index', compact('orders', 'revenue', 'counts'));
    }
}
