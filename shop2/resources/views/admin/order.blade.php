<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hungdz Admin</title>
    <!-- plugins:css -->
   @include('admin.css')
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  </head>
  <body>
    @include('admin.scobar')
      
     <style type="text/css">.title_title{
         text-align:center;
         font-size:25px;
         font-weight:bold;
        padding-bottom:40px;}

      </style>
        @include('admin.nar')
        <!-- partial -->
      <div class="main-panel">
      @if(session()->has('message'))
<div class ="alert alert-success">
  {{session()->get('message')}}
</div>

            @endif
          <div class="content-wrapper">
              <h1 class="title_title"><a href="{{url('order')}}"style="color:white">All order</a></h1>

              <div style="padding-left:400px;padding-bottom:30px;">
              <form action="{{url('searcho')}}"method="get">
              <input type="text" name="search" placeholder="Tim Kiem"required="">
              <input type="submit"value="search" class="btn btn-outline-success">
     </form>
            </div>
              <table class="table table-bordered">
  <thead>
    <tr>
                  <th>name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Product title</th>
                  <th>quantity</th>
                  <th>Price</th>
                  <th>Cách thức</th>
                  <th>Trạng thái</th>
                  <th>Image</th>
                  <th>Duyệt</th>
                  <th>Xóa</th>
                  <th>IN</th>
    </tr>
  </thead>
  <tbody>
      @forelse($order as $order)
    <tr>
     
    <td>{{$order->name}}   </td>
   <td>{{$order->email}}      </td>
    <td>{{$order->address}}      </td>
    <td>{{$order->phone}}      </td>
    <td> {{$order->product_title}}     </td>
    <td>{{$order->quantity}}      </td>
   <td>{{$order->price}}     </td>  
    <td> {{$order->payment_status}}     </td>
    <td>{{$order->delivery_status}}      </td>
    <td><img class="img"src="/product/{{$order->image}}">    </td>
    <td>
        @if($order->delivery_status=='chưa duyệt')
    <a href="{{url('deli',$order->id)}}"class="btn btn-success">Delivey</td>@else<p style="color:green">Duyệt</p>@endif
    
    <td><a href="{{url('deleteorder',$order->id)}}"class="btn btn-danger">Xóa</td>
  <td><a href="{{url('in',$order->id)}}"class="btn btn-secondary">In</td>
  </tr>

  @empty<tr><td colspan="16" style="color:red;text-align:center">Khong co du lieu</td></tr></p>
    
    @endforelse
  </tbody>
</table>
</div></div>
        @include('admin.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>