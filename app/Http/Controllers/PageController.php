<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // TODO: подтянуть услуги для слайдера/превью, акции, отзывы
        return view('home');
    }

    public function about()
    {
        // TODO: данные компании, лицензии, история
        return view('pages.about');
    }


    public function contacts()
    {
        return view('pages.contacts');
    }

    public function getManagerPhone()
    {
        $phone = '+7 (800) 123-45-67';
        
        return response()->json([
            'phone' => $phone,
            'formatted' => '8 800 123-45-67'
        ]);
    }

    public function newsletterSubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        // TODO: сохранить email в таблицу subscribers
        // Subscriber::create(['email' => $request->email]);

        return back()->with('success', 'Вы успешно подписались на новости!');
    }
}
