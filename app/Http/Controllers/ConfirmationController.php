<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ConfirmationController extends Controller
{
    public function index(){
        $parentCategories = Category::where('parent_id',NULL)->get();
        return response()->view('shop.checkout.success', compact('parentCategories'), 200)
        ->header("Refresh", "5;url=/");
    }
}
