<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
				if (auth()->user()->role == 'customer') {
					return redirect('/');
				}
				
				$orders = Order::orderBy('id','desc')->get();
				$total = Order::where('status', '=', 'dibayar')->sum('total_price');
				$user = User::orderBy('id', 'desc')->get();
				return view('home2', compact('orders', 'user'));
    }
}
