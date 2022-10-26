<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
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
      <!-- Custom styles for this template -->
      <link href="Home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="Home/css/responsive.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <style type="text/css">
     .hungdz{
         margin:auto;
         width:70%;
         text-align:center;
         padding:30px;
     } table,th,td{
         border:1px solid grey;

     }.hung{
         font-size: 30px;
         padding:5px;
         background:blue;
     }.img{
        height:200px;
        width:200px;
     }
 </style>
   <body>@include('sweetalert::alert')
      <div class="hero_area">
      @include('home.header')
 
      @if(session()->has('message'))
<div class ="alert alert-success">
  {{session()->get('message')}}
</div>

            @endif
          

     <div class="hungdz">
   <table>
<tr>
<th class="hung">Product title</th>
<th class="hung">product quantity</th>
<th class="hung">price</th>
<th class="hung">image</th>
<th class="hung">action</th>

</tr>
<?php $totalprice=0; ?>
@foreach($cart as $cart)
<tr>
<td>{{$cart->product_title}}</td>
<td>{{$cart->quantity}}</td>
<td>{{$cart->price}}</td>
<td><img class="img"src="/product/{{$cart->image}}"></td>
<td><a class="btn btn-danger " onclick="confirmation(event)"href="{{url('/remove',$cart->id)}}">Remove product</a></td>
</tr>
<?php $totalprice=$totalprice + $cart->price ?>
@endforeach

{{$totalprice}}
   </table>
<div>
   <h1>Totalprice:{{$totalprice}}</h1>

</div>
<div><h1>Proceed to Order</h1>
<a href="{{url('cash')}}" class="btn btn-danger">Cash</a>


<a href="{{url('stripe',$totalprice)}}"class="btn btn-danger">Use Card</a>

</div>

        


   
    
         
        
      </div>
      <script>
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
</script>
      <!-- jQery -->
      <script src="Home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="Home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="Home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="Home/js/custom.js"></script>
   </body>
</html>