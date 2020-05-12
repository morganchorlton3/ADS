<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style type="text/css" media="all">
        .container {
  display: grid | inline-grid;
}
    </style>
  </head>
  <body>
    <table class="table table-bordered" style="width:100%">
        <tr>
            <th style="text-align: center">Barcode</th>
            <th style="text-align: center">Name</th>
            <th style="text-align: center">Price</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td height="50">
                <img src="data:image/png;base64,' . {{ DNS1D::getBarcodePNG($product->barcode, "EAN13") }} . '" alt="barcode"/>
            </td>
            <td height="50"> 
                {{$product->name}}
            </td>
            <td height="50">
                {{ FormatPrice($product->price)}}
            </td>
        </tr>
        @endforeach
    </table>
  </body>
</html>