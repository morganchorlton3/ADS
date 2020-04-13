<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    table{
      width:100%;
      margin-bottom: 10px;
    }
    table, th, td {
      border: 1px solid black;
    }
  </style>
</head>
<body>
  <div class="row col-lg-12">
      <h6 class="text-center">Delivery Details</h6>
  </div>
  @foreach($run->deliveries as $delivery)
  <table>
    <tr>
      <th width="20%">Order No.  {{$delivery->Order->id }}</th>
      <th width="60%">{{ $delivery->Order->User->title }} {{ $delivery->Order->User->first_name }} {{ $delivery->Order->User->last_name }}</th>
      <th width="20%">Total Items: {{$delivery->Order->itemCount }}</th>
    </tr>
    <tr>
      <th width="20%">
        <p>{{$delivery->Order->SlotBooking->slot->start }} - {{$delivery->Order->SlotBooking->slot->end }}</p>
      </th>
      <th width="60%">
        <p>{{$delivery->Order->User->address->address_line_1 }}</p>
        <p>{{$delivery->Order->User->address->address_line_2 }}</p>
        <p>{{$delivery->Order->User->address->post_code }}</p>
      </th>
      <th width="20%">
        <p>{{$delivery->Order->User->phone_number }}</p>
      </th>
      
    </tr>
   
  </table>
  @endforeach
</body>
</html>