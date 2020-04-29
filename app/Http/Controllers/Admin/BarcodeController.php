<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use PDF;

class BarcodeController extends Controller
{
    public function downloadPDF(){
        $products = Product::all();
        $pdf = PDF::loadView('admin.export.barcodes', compact('products'));
        return $pdf->download('Product-Barcodes.pdf');
    }
}
