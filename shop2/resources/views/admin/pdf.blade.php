<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hungdz Admin</title>
</head>
<body>
<h3>{{$order->name}}</h3>
<h3>{{$order->email}}</h3>
<h3>{{$order->phone}}</h3>
<h3>{{$order->address}}</h3>
<h3>{{$order->user_id}}</h3>
<h3>{{$order->product_title}}</h3>
<h3>{{$order->quantity}}</h3>
<h3>{{$order->price}}</h3>
<h3>{{$order->product_id}}</h3>
<h3>{{$order->payment_status}}</h3>
<h3>{{$order->name}}</h3>
<img height="250" width="450" src="product/{{$order->image}}">


</body>