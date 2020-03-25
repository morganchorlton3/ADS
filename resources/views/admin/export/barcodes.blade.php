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
            <th>Barcode</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>
                <img src="data:image/png;base64,' . {{ DNS1D::getBarcodePNG($product->barcode, "EAN13") }} . '" alt="barcode"/>
            </td>
            <td>
                {{$product->name}}
            </td>
            <td>
                {{ FormatPrice($product->price)}}
            </td>
        </tr>
        @endforeach
    </table>
  </body>
</html>