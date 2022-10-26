<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hungdz Admin</title>
   <base href="/public">
   @include('admin.css')
   <style type="text/css">
       .div_center{
           text-align:center;
           padding-top: 80px;
           
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
                  <h1 class="font">Edit products</h1>
                  <form action="{{url('update_pro',$products->id)}}" method="post" enctype="multipart/form-data">
 @csrf
                  <label>Product title</label>
                  <input type="text" name="title" placeholder="nhap du lieu" required="" value="{{$products->title}}"></input>
              </div>
              <div class="div_center">
                 
                  <label>Product Descript</label>
                  <input type="text" name="descript" placeholder="nhap du lieu"required=""value="{{$products->description}}"></input>
              </div>
              <div class="div_center">
                  
                  <label>Product Price</label>
                  <input type="number" name="price" placeholder="nhap du lieu"required=""value="{{$products->price}}"></input>
              </div>
              <div class="div_center">
              <label>Discount  Price</label>
                  <input type="number" name="dis_price" placeholder="nhap du lieu"value="{{$products->discount_price}}"></input>
              </div>
              <div class="div_center">
                  
                  
                  <label>Product quantity</label>
                  <input type="number" min="0" name="quantity" placeholder="nhap du lieu"required=""value="{{$products->quantity}}"></input>
              </div>
              <div class="div_center">
                
                <label>Change image</label>
                <input type="file" name="image" placeholder="nhap du lieu"></input>
            </div>
              <div class="div_center">
                
                  <img style="margin:auto," height="100" width="100" src="/product/{{$products->image}}">
              </div>

          
              <div class="div_center">
                  <label>Product Catagory</label>
                  <select name="category"> 
                      
                  <option value="{{$products->category}}"selected="">{{$products->category}}</option>
                  @foreach($category as $category)<option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach</select>
              </div>

              <div class="div_center">
            
            <input type="submit" value="EDITproduct" class="btn btn-success" ></input>
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