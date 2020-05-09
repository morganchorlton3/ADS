<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Milon\Barcode\DNS1D;
use PDF;

class BarcodeController extends Controller
{
    public function downloadPDF(){
       /*$product = Product::find(2);
        $d = new DNS1D();
        $d->setStorPath(__DIR__.'/cache/');
        echo $product->barcode;
        echo $d->getBarcodeHTML($product->barcode, 'EAN13');*/
        
        $products = Product::all();
        $pdf = PDF::loadView('admin.export.barcodes', compact('products'));
        return $pdf->download('Product-Barcodes.pdf');
    }
}
