<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::paginate(16);
        $parentCategories = Category::where('parent_id',NULL)->get();
        //return view('home', compact('parentCategories'));
        return view('home')->with([
            'products' => $products,
            'parentCategories' => $parentCategories
        ]);
    }
}
