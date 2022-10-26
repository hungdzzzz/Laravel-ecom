<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="Home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="Home/css/font-awesome.min.css" rel="stylesheet" />
      <link href="Home/css/top.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="Home/css/style.css" rel="stylesheet" />
      <link href="Home/css/hung.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- responsive style -->
      <link href="Home/css/responsive.css" rel="stylesheet" />
      <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
   </head>@include('home.header')<body>@include('sweetalert::alert')
   <table class="table">
  <thead>
    <tr>
      <th scope="col">Product title</th>
      <th scope="col">quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Payment</th>
      <th scope="col">Delivery</th>
      <th scope="col">imgae</th>
      
      <th scope="col">Delete </th>
      <th scope="col">Cancel </th>


    </tr>
  </thead>
  <tbody>
  @foreach($order as $order)
  <tr>
    <td>{{$order->product_title}}</td>
      <td>{{$order->quantity}}</td>
      <td>{{$order->price}}</td>
      <td>{{$order->payment_status}}</td>
      <td>{{$order->delivery_status}}</td>
      <td><img height="100"width="180" src="product/{{$order->image}}"></td>
      <td><a class="btn btn-danger " onclick="confirmation(event)"href="{{url('/deleteh',$order->id)}}">DELETE</a></td>
      <td >
        @if($order->delivery_status=='chưa duyệt')
        <a class="btn btn-danger "onclick="confirmation(event)" href="{{url('/cancel',$order->id)}}">Cancel </a>
      @else<p color="red">Not allow</p> @endif</td>
    </tr>@endforeach
    
</tr>
  </tbody>
</table><script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to cancel this product",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {


                 
                window.location.href = urlToRedirect;
               
            }  


        });

        
    }
</script></body>