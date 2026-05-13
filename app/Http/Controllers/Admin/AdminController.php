<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Order;
use App\Models\Review;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'services_count'    =>Service::count(),
            'orders_new'        =>Order::where('status', 'new')->count(),
            'reviews_pending'   =>Review::where('status', 'pending')->count(),
            'users_count'       =>User::where('role', 'user')->count(),
        ];

        $latestOrders = Order::with('service')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestOrders'));
    }

    // Services
        public function servicesIndex()
        {
            $services = Service::orderBy('sort_order')->paginate(20);
    
            return view('admin.services.index', compact('services'));
        }
    
        public function servicesCreate()
        {
            return view('admin.services.create');
        }
    
        public function servicesStore(Request $request)
        {
            $validated = $request->validate([
                'title'       => 'required|string|max:255',
                'slug'        => 'required|string|max:255|unique:services,slug',
                'description' => 'nullable|string',
                'price'       => 'required|numeric|min:0',
                'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'is_active'   => 'boolean',
            ]);
    
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('services', 'public');
            }
    
            $validated['is_active'] = $request->boolean('is_active', true);
            $validated['sort_order'] = $validated['sort_order'] ?? 0;
    
            Service::create($validated);
    
            return redirect()->route('admin.services.index')->with('success', 'Услуга добавлена.');
        }
    
        public function servicesEdit(Service $service)
        {
            return view('admin.services.edit', compact('service'));
        }
    
        public function servicesUpdate(Request $request, Service $service)
        {
            $validated = $request->validate([
                'title'       => 'required|string|max:255',
                'slug'        => 'required|string|max:255|unique:services,slug,' . $service->id,
                'description' => 'nullable|string',
                'price'       => 'required|numeric|min:0',
                'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'is_active'   => 'boolean',
            ]);
    
            if ($request->hasFile('image')) {
                if ($service->image) {
                    Storage::disk('public')->delete($service->image);
                }
                $validated['image'] = $request->file('image')->store('services', 'public');
            }
    
            $validated['is_active'] = $request->boolean('is_active', true);
    
            $service->update($validated);
    
            return redirect()->route('admin.services.index')->with('success', 'Услуга обновлена.');
        }
    
        public function servicesDestroy(Service $service)
        {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
    
            $service->delete();
    
            return redirect()->route('admin.services.index')->with('success', 'Услуга удалена.');
        }


    // Orders
        public function ordersIndex()
        {
            $orders = Order::with('service', 'user')->latest()->paginate(20);

            return view('admin.orders.index', compact('orders'));
        }

        public function ordersShow(Order $order)
        {
            return view('admin.orders.show', compact('order'));
        }

        public function ordersUpdateStatus(Request $request, Order $order)
        {
            $request->validate([
                'status' => 'required|in:new,processing,completed,cancelled',
            ]);

            $order->update(['status' => $request->status]);

            return back()->with('success', 'Статус обновлен.');
        }

        public function ordersNotify(Request $request, Order $order)
        {
            return back()->with('success', 'Уведомление отправлено.');
        }


    //Users
        public function usersIndex()
        {
            $users = User::whereIn('role', ['user', 'manager'])
                ->withCount('orders')
                ->latest()
                ->paginate(20);

            return view('admin.users.index', compact('users'));
        }

        public function usersShow(User $user)
        {
            return view('admin.users.show', compact('user'));
        }

        public function usersUpdateRole(Request $request, User $user)
        {
            $request->validate([
                'role' => 'required|in:user,manager,admin',
            ]);

            $user->update(['role' => $request->role]);

            return back()->with('success', 'Роль изменена на: ' . User::$roles[$request->role]);
        }

}
