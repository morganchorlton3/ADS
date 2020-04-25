<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'ADS') }} - Invoice</title>
    
    <style>
        body{
            font-family: 'Nunito', sans-serif;
        }
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total {
        border-top: 2px solid #eee;
        font-weight: bold;
        margin-top: 8px;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: 'Nunito';
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    .title-img{
        display: block;
margin-left: auto;
margin-right: auto;
    }
    </style>
</head>

<body>

    <div class="invoice-box">
        <img src="{{ asset('img/Main-logo.gif') }}" style="width:100%; max-width:150px; min-width:150px; margin-top:15px; margin-left: 50%; transform: translate(-50%)">

        <h2 style="text-align: center;">We will see you soon with your order!</h2>

        <table cellpadding="0" cellspacing="0">
            <tr class="information">
                <td>
                    <table>
                        <tr>
                            
                            <td>
                                {{$order->user->first_name . ' ' . $order->user->last_name }}<br>
                                {{ $order->user->email}}<br>
                            </td>

                            <td>
                                {{ $order->user->address->address_line_1 }}<br>
                                {{ $order->user->address->address_line_2 }}<br>
                                {{$order->user->address->post_code }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0">
            
            <tr class="heading">
                <td width="60%">
                    Item
                </td>
                
                <td style="text-align: center" width="20%">
                    Price
                </td>

                <td style="text-align: center" width="20%">
                    Qty
                </td>

                <td style="text-align: center" width="20%">
                    Total Paid
                </td>
            </tr>
            
            @foreach($order->orderProducts as $product)
            <tr class="item">
                <td width="60%">
                    {{ $product->product->name}}
                </td>
                
                <td style="text-align: center" width="20%">
                    {{ formatPrice($product->pricePaid) }}
                </td>

                <td style="text-align: center" width="20%">
                    {{ $product->quantity }}
                </td>

                <td style="text-align: center" width="20%">
                    {{ formatPrice($product->pricePaid * $product->quantity)}}
                </td>
            </tr>
            @endforeach
        </table>
        <table cellpadding="0" cellspacing="0" style="margin-top:25px;">
            <tr>
                <td width="60%"></td>
                <td  style="text-align: center" width="20%">Delivery: </td>
                <td style="text-align: center" width="20%">
                    {{ formatPrice($product->pricePaid * $product->quantity)}}
                </td>
            </tr>
            <tr>
                <td width="60%"></td>
                <td style="text-align: center" width="20%">Total: </td>
                <td style="text-align: center" width="20%">
                    {{ formatPrice($order->total)}}
                </td>
            </tr>
        </table>
    </div>
</body>
</html>