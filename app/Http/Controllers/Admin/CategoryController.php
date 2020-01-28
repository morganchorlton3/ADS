<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        
        $primaryCategories = Category::where('type', 1)->get();
        $primary_cat = Category::where('type', 1)->get();
        $sub_categories = Category::where('type', 2)->get();
        $sub_sub_categories = Category::where('type', 3)->get();
        $alerts = DB::table('alerts')->get();
        return view('admin.categories.index')->with([
            'primaryCategories' => $primaryCategories,
            'sub_cat' => $sub_categories,
            'sub_sub_cat' => $sub_sub_categories,
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
        $category = new Category();
        if($request->type == 1){
            $category->cat = $request->name;
        }else if($request->type == 2){
            $category->sub_cat = $request->name;
        }elseif($request->type == 3){
            $category->sub_sub_cat = $request->name;
        }
        $category->type = $request->type;
        $category->save();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $category = Category::find($request->id);
        if($category->type == 2){
            $category->primary = $request->primary;
        }else if($category->type == 3){
            $category->head = $request->primary;
        }
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
}
