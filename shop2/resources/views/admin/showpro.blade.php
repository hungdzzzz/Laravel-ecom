<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hungdz Admin</title>
</head>
<body>
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
    <style css="text/css">.th_color{
        background: skyblue;
    }
    </style>
  </head>
  <body>
    @include('admin.scobar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.nar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">  @if(session()->has('message'))
<div class ="alert alert-success">
  {{session()->get('message')}}
</div>

            @endif
            <form action= "{{url('/search')}}"method="get"><input type="text"name="search" style="color:black" placeholder=" tim  du lieu" required="">
               <input type ="submit"value="Search" class="btn btn-success" >          
          </form>
       
        <table>
        <table class="table table-bordered">
  <thead class="th_color">
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Product</th>
      <th scope="col">Descipt</th>
      <th scope="col">Quantiyy</th>
      <th scope="col">Category</th>
      <th scope="col">price</th>
      <th scope="col">Dicuont</th>
      <th scope="col">Image</th>
      
      <td colspan="3">EDIT</td>
    </tr>
  </thead>
  @forelse($products as $products)
  <tbody>
    <tr>
    <td>{{$products->id}}</td>
      <td>{{$products->title}}</td>
      <td>{{$products->description}}</td>
      <td>{{$products->quantity}}</td>
      <td>{{$products->category}}</td>
      <td>{{$products->discount_price}}</td>
      <td>{{$products->price}}</td>
      
      <td><img src="/product/{{$products->image}}"></td>

      <td><a href="{{url('delete',$products->id)}}" class="btn btn-danger "onclick="return confirm('Are you sure')">DELETE</td>
      <td><a href="{{url('edit',$products->id)}}"class="btn btn-primary">EDIT</td>
  </tbody>
  @empty<tr><td colspan="16" style="color:red;text-align:center">Khong co du lieu</td></tr></p>
  @endforelse
</table>




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
