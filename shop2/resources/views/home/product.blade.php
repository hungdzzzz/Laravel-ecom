<section class="product_section layout_padding">
   
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
<div>
   <form action="{{url('product_search')}}" method="get">  <input type="text" name="search"placeholder="tim kiem san pham">
   <input type="submit" value="search"></form></div>


            <div class="row">
               @foreach($products as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('pro_detail',$product->id)}}" class="option1">
                       Product Detail
</a>
                           <form action="{{url('add_cart',$product->id)}}"method="Post">@csrf
                              <div class="row">
                                 <div class="col-md-4"> 
                                    
                                 <input type="number"name="quantity"value="1"min="0"></div>
                           
                           
                           <div class="col-md-4">
                         <input type="submit" value="add to cart">
                        
                        </div>
                        </div>
                 

                           </form>
                           
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$product->image}}" alt="" href="showorder">
                     </div>
                     <div class="detail-box">
                        <h5><a href="">
                          {{$product->title}}</a>
                        </h5>
                        @if($product->discount_price!=null)
                        <h6 style="color:red">
                        discoutprice<br>
                        ${{$product->discount_price}}
                        </h6> 
                        <h6 style="text-decoration:line-through;color:blue">
                        ${{$product->price}}
                        </h6>
                        @else
                        <h6 style="color:blue">
                        Price
                        <br>
                        ${{$product->price}}
                        </h6>
                        @endif

                        
                     </div>
                  </div>
               </div>
             @endforeach
             
           <span style="padding-top :100px"> {!!$products->links('pagination::bootstrap-5')!!}</span>
         </div>
         <a href="" class="to-top">
    <i class="fas fa-chevron-up"> </i>
  </a>

      </section>
      
     