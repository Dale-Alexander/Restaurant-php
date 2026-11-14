<?php

namespace App\Http\Controllers;

use App\Models;

class DashboardController extends Controller
{
    public function index($pageNo, $pageSize = 10){
        $dashboard_stats = [
            'today_revenue' => Payment::whereDate('created_at', today())->sum('amount'),
            'total_revenue' -> Payment::sum('amount'),
            'total_orders' => Order::count(),
            'today_orders' => Order::whereDate('created_at', today())->count(),
            'total_reservations' => Reservation::count(),
            'today_reservations' => Reservation::whereDate('reserved_at', today())->count()
        ];

        $recent_orders = Reservation::with('user:id,name,phone')->select('user_id','is_inside', 'start_date_time','notes', 'size')->where('status', ReservationStatus::BOOKED)->latest()->skip(($pageNo - 1) * $pageSize)->take($pageSize)->get();


        return view('dashboard.index', compact('recent_orders', 'dashboard_stats'));
    }
}
