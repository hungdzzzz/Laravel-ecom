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
       .div_center{
           text-align:center;
           padding-top: 40px;
           
       }
       .font{
           font-size:40px;
           padding-bottom:40px;
       }
   </style>
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
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.nar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              <div class="div_center">
              @if(session()->has('message'))
<div class ="alert alert-success">
  {{session()->get('message')}}</div>  @endif
                  <h1 class="font">Add products</h1>
                  <form action="{{url('add_product')}}" method="post" enctype="multipart/form-data">
 @csrf
                  <label>Product title</label>
                  <input type="text" name="title" placeholder="nhap du lieu" required=""></input>
              </div>
              <div class="div_center">
                 
                  <label>Product Descript</label>
                  <input type="text" name="descript" placeholder="nhap du lieu"required=""></input>
              </div>
              <div class="div_center">
                  
                  <label>Product Slug</label>
                  <input type="text" name="slug" placeholder="nhap du lieu"required=""></input>
              </div>
              <div class="div_center">
                  
                  <label>Product Price</label>
                  <input type="number" name="price" placeholder="nhap du lieu"required=""></input>
              </div>
              <div class="div_center">
              <label>Discount  Price</label>
                  <input type="number" name="dis_price" placeholder="nhap du lieu"></input>
              </div>
              <div class="div_center">
                  
                  
                  <label>Product quantity</label>
                  <input type="number" min="0" name="quantity" placeholder="nhap du lieu"required=""></input>
              </div>
              <div class="div_center">
                  
                  <label>Product Catagory</label>
                  <select name="category"required="">
                      @foreach($category as $category)<option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach</select>
              </div>
              <div class="div_center">
                
                  <label>Product image</label>
                  <input type="file" name="image"required="" placeholder="nhap du lieu"></input>
              </div>
              <div class="div_center">
            
                  <input type="submit" value="add product" class="btn btn-success" ></input>
              </div>
    </from>

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