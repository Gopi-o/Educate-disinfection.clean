<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $services = Service::where('is_active', true)
        ->orderBy('sort_order')
        ->get();

        $selectedService = null;
        if ($request->has('service')) {
            $selectedService = Service::find($request->service);
        }

        return view('order.create', compact('services', 'selectedService'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id'    =>'required|exists:services,id',
            'client_name'   =>'required|string|max:100',
            'client_phone'  =>'required|string|max:20',
            'client_email'  =>'required|email|max:255',
            'address'       =>'nullable|string|max:500',
            'comment'       =>'nullable|string|max:1000',
        ]);

        if (auth()->check()) {
            $validated['user_id'] = auth()->id();
        }

        $order = Order::create($validated);
        return redirect()->route('order.success', $order);
    }


    public function success(Order $order)
    {
        return view('order.success', compact('order'));
    }
}
