<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\User;
use App\Models\Food;
use App\Models\DetailOrder;

class DashboardController extends Controller
{
    public function index(){
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $totalRevenueToday = Order::whereDate('created_at', $today)->sum('amount');
        $totalOrdersToday = Order::whereDate('created_at', $today)->count();
        $totalCustomersToday = User::whereDate('created_at', $today)->count();

        $totalRevenueThisMonth = Order::whereMonth('created_at', $today->month)
            ->whereYear('created_at', $today->year)
            ->sum('amount');
        $totalOrdersThisMonth = Order::whereMonth('created_at', $today->month)
            ->whereYear('created_at', $today->year)
            ->count();
        $startOf7DaysAgo = Carbon::now()->subDays(7);
        $totalRevenueLast7Days = Order::whereBetween('created_at', [$startOf7DaysAgo, $tomorrow])
            ->sum('amount');
        $totalOrdersLast7Days = Order::whereBetween('created_at', [$startOf7DaysAgo, $tomorrow])
            ->count();
        $foodSum = Food::count();
        $totalQuantityThisMonth = DetailOrder::whereMonth('created_at', $today->month)
            ->whereYear('created_at', $today->year)
            ->sum('quantity');
        $totalQuantityLast7Days = DetailOrder::whereBetween('created_at', [$startOf7DaysAgo, $tomorrow])
            ->sum('quantity');
        return view('Admin/dashboard', compact('totalQuantityLast7Days', 'totalQuantityThisMonth', 'foodSum', 'totalRevenueToday', 'totalOrdersToday', 'totalCustomersToday', 'totalRevenueThisMonth', 'totalOrdersThisMonth', 'totalRevenueLast7Days', 'totalOrdersLast7Days'));
    }

    public function getMonthlyRevenue(){
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $startOfMonth = Carbon::createFromDate(null, $i, 1)->startOfMonth();
            $endOfMonth = $startOfMonth->copy()->endOfMonth();
            $totalRevenue = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->sum('amount');
            array_push($data, (int)$totalRevenue);
        }
        return response()->json($data);
    }

    public function getMonthlyOrderCount(){
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $startOfMonth = Carbon::createFromDate(null, $i, 1)->startOfMonth();
            $endOfMonth = $startOfMonth->copy()->endOfMonth();

            $totalOrders = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->count();

            array_push($data, (int)$totalOrders);
        }

        return response()->json($data);
    }
}
