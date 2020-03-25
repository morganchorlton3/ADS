<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Category;
use File;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductLocation;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create')->with('categories', $categories);
    }

    public function newProduct(Request $request){
        //dd($request);
        $request->validate([
            'barcode' => 'required|string|unique:products',
            'name' => 'required|string',
            'price' => 'required',
            'shortDesc' => 'required|string',
            'detailedDesc' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
            'aisle' => 'required',
            'mod' => 'required',
            'shelf' => 'required',
            'slot' => 'required',
        ]);
        
        $imageName = '1.'.$request->image->extension(); 
        
        $path = public_path() . '/ProductImages/' .  $request->barcode . '/';
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        $img = Image::make($request->file('image'))->resize(144, 144)->encode('jpeg');
        $img->save('ProductImages/' . $request->barcode . '/' . $imageName, 100);

        $Product = new Product;
        $Product->name = $request->name;
        $Product->shortDesc = $request->shortDesc;
        $Product->detailedDesc = $request->detailedDesc;
        $Product->price = $request->price;
        $Product->barcode = $request->barcode;
        $Product->category_id = $request->category;
        $Product->save();
        $productLocation = new ProductLocation();
        $productLocation->product_ID = Product::latest()->first()->id;
        $productLocation->aisle = $request->aisle;
        $productLocation->mod = $request->mod;
        $productLocation->shelf = $request->shelf;
        $productLocation->slot = $request->slot;
        $productLocation->stock = 0;
        $productLocation->save();
   
        return back()->with('success', 'Product Created!');
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
