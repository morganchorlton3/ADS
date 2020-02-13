<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories= Category::where('parent_id',NULL)->get();
        $subCategory = Category::where('parent_id', '!=' , NULL)->get();
        $alerts = DB::table('alerts')->get();
        return view('admin.categories.index')->with([
            'categories' => $categories,
            'subCategory' => $subCategory,
            'alerts' => $alerts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'type' => ['required'],
        ]);
        if($request->type == 1){
            $category = new Category();
            $category->name = $request->name;
            $category->save();
        }else if($request->type == 2){
            $subCategory = new Category();
            $subCategory->name = $request->name;
            $subCategory->parent_id = $request->primary;
            $subCategory->save();
        }
        return redirect()->route('admin.category.index')->with('success_toast', "Category Created");
    }

    public function new()
    {
        $alerts = DB::table('alerts')->get();
        return view('admin.category.create')->with([
            'alerts' => $alerts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dd($request);
        $category = Category::find($request->id);
        $category->parent_id = $request->primary_id;
        $category->save();
        return back()->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        return back()->with('toast_success', 'Category Removed!');
    }

    public function categoryView($slug){
        $categories = Category::where('parent_id',NULL)->get();
        $category = Category::where('slug', $slug)->get();
        $products = Product::where('category_id', $category[0]->id)->get();
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view('shop.category')->with([
            'categories' => $categories,
            'products' => $products,
            'category' => $category,
            'parentCategories' => $parentCategories
        ]);
    }
}
