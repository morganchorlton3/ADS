<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
