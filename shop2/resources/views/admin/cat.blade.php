<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hungdz Admin</title>
    <!-- plugins:css -->
   @include('admin.css')
   <style type="text/css">
.div-center{
    text-align:center;
    padding top : 40px;
}
.table{
  margin:auto;
  width:50%;
  text-align:center;
  margin-top:30px;
  border:3px solid white;
}

   </style>
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  </head>
  <body>
    @include('admin.scobar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.nar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @if(session()->has('message'))
<div class ="alert alert-success">
  {{session()->get('message')}}
</div>

            @endif
          
          <div class ="div-center"><h1>Addcate</h1>
        <form action="{{url('/add_cat')}}" method="Post"enctype="multipart/form-data">
            @csrf<input type="text" name="category" placeholder="Nhap ten">
        <input type="submit" class="btn btn-success"name="submit"  value="Add cat"></form>
        
        <label>slug</label>
                  <input type="text" name="slug" placeholder="nhap du lieu" required=""></input>
        </div>
      
        <table class="table">

        <tr>
          
        <td>category name</td>
        <td>Slug</td>
      <td>Action</td>
      </tr>
      @foreach( $categories as $data)
      <tr>
          <td>{{$data->category_name}}</td>
          <td>{{$data->slug}}</td>
          <td>
            <a onclick="return confirm('ban chac xoa chu')" class="btn btn-danger" a href="{{url('delete',$data->id)}}">DELETE</a>
          </td>

      </tr>
      @endforeach
        </table>
      
      
      </div>
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