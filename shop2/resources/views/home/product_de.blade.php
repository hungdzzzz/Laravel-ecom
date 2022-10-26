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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

   </head>
   <body>@include('sweetalert::alert')<div class="hero_area">
   @include('home.header')
   <div class="col-sm-6 col-md-4 col-lg-4" style="margin :auto; ">
                  
                     <div style="width:5px">
                        <img src="product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                          {{$products->title}}
                        </h5>
                        @if($products->discount_price!=null)
                        <h6 style="color:red">
                        discoutprice<br>
                        ${{$products->discount_price}}
                        </h6> 
                        <h6 style="text-decoration:line-through;color:blue">
                        ${{$products->price}}
                        </h6>
                        @else
                        <h6 style="color:blue">
                        Price
                        <br>
                        ${{$products->price}}
                        </h6>
                        @endif
                        <h6>{{$products->category}}</h6>
                        <h6>{{$products->description}}</h6>
                        <h6>{{$products->quantity}}</h6>
                        <form action="{{url('add_cart',$products->id)}}"method="Post">@csrf
                              <div class="row">
                                 <div class="col-md-4"> 
                                    
                                 <input type="number"name="quantity"value="1"min="0"></div>
                           
                           
                           <div class="col-md-4">
                         <input type="submit" value="add to cart">
                         <div id="rateYo"></div>
 
                        </div>
                        </div>
                 

                           </form>
                     </div>
                  </div>
               </div>
     
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="Home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="Home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="Home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="Home/js/custom.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>$(function () {
 
 $("#rateYo").rateYo({
   ratedFill: "#E74C3C"
 }).on("rateyo.set", function (e, data) {
 
 alert("The rating is set to " + data.rating + "!");
});
});

</script>
   </body>
</html>