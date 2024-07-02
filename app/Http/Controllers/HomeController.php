<?php

namespace App\Http\Controllers;

use App\Models\Product;

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
        $specialDealProducts = Product::where('quantity', '>', 0)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('home', compact('specialDealProducts'));

        // return view('home');
    }
}
