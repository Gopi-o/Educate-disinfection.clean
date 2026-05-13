<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->with('service')->latest()->take(5)->get();

        return view('dashboard.index', compact('user', 'orders'));
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update($validated);

        return back()->with('success', 'Профиль обновлен.');
    }

    public function orders()
    {
        $orders = Auth::user()->orders()->with('service')->latest()->paginate(10);

        return view('dashboard.orders', compact('orders'));
    }

    public function orderShow(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('dashboard.order_show', compact('order'));
    }

    public function subscribe(Request $request)
    {
        $user = Auth::user();
        $user->update(['is_subscribed' => !$user->is_subscribed]);

        $message = $user->is_subscribed 
            ? 'Вы подписались на новости.' 
            : 'Вы отписались от новостей.';

        return back()->with('success', $message);
    }
}
