<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use Session;
use Stripe;
use RealRashid\SweetAlert\Facades\Alert;
class HomeController extends Controller
{  public function index(){
  $products=Product::paginate(3);
  $categories=Category::all();
 return view('home.userpage',compact('products','categories'));

   
}


public function redirect(){
   $usertype=Auth::user()->usertype;
   if($usertype=='1')
   {  $total_product=product::all()->count();
    $total_order=order::all()->count();
    $total_user=user::all()->count();

    $order=order::all();
    $total_revenue=0;
    foreach($order as $order ){
      $total_revenue=$total_revenue=$order->price;


    }
  $total_delivered=order::where('delivery_status','=','chua duyet')->get()->count();
  
  $total_delivereds=order::where('delivery_status','=','duyet')->get()->count();

       return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_delivereds'));
   }else{
    $products=Product::paginate(3);
    $categories=Category::all();
       return view('home.userpage',compact('products','categories'));
   }
  }

  public function prod($id){
    $products=product::find($id);
    
    return view('home.product_de',compact('products'));
  }


  public function add_cart(Request $Request ,$id){
    if(Auth::id()){
      $user=Auth::user();
   $products=product::find($id);
   $cart=new cart;
   $cart->name=$user->name;
   $cart->email=$user->email;
   $cart->phone=$user->phone;
   $cart->address=$user->address;
   
   $cart->user_id=$user->id;
   $cart->Product_title=$products->title;

   if($products->discount_price!=null)
   {
     $cart->price=$products->discount_price *$Request->quantity; ;
   }else{
    $cart->price=$products->price* $Request->quantity;
   }
   $cart->image=$products->image;
   $cart->product_id=$products->id;
   $cart->quantity=$Request->quantity;
   $cart->save();
   Alert::success('Add thanh cong','chung toi da add thanh cong');
   return redirect()->back();

    }else{
      return redirect('login');
    }
  }
  public function cart()
  {   if(Auth::id()){
    $id=Auth::user()->id;
    $cart=cart::where('user_id','=',$id)->get();
   

      return view('home.show_cart',compact('cart'));
  
  }

  else{
    return redirect('login');
  }

  }
  public function remove($id){
    $cart=cart::find($id);
    $cart->delete();
    return redirect()->back();

  }
  public function cash(){
  $user=Auth::user();
  $userid=$user->id;
 $data=cart::where('user_id','=',$userid)->get();
  foreach($data as $data){
    $order=new order;
    $order->name=$data->name;
    $order->email=$data->email;
    $order->phone=$data->phone;
    $order->address=$data->address;
    $order->user_id=$data->User_id;
    $order->product_title=$data->product_title;
    $order->price=$data->price;
    $order->quantity=$data->quantity;
    $order->image=$data->image;
    $order->product_id=$data->Product_id;
    $order->payment_status='chưa thanh toán';
    $order->delivery_status='chưa duyệt';
    $order->save();
    $cart_id=$data->id;
    $cart=cart::find($cart_id);
    $cart->delete();

  }return redirect()->back()->with('message', 'mua thanh cong');
  }

  public function stripe($totalprice){
    return view('home.stripe',compact('totalprice'));
  }
  public function stripePost(Request $request,$totalprice)
  {
      Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
 
      Stripe\Charge::create ([
              "amount" => $totalprice * 100,
              "currency" => "usd",
              "source" => $request->stripeToken,
              "description" => "Test payment from itsolutionstuff.com." 
      ]);
      $user=Auth::user();
      $userid=$user->id;
     $data=cart::where('user_id','=',$userid)->get();
      foreach($data as $data){
        $order=new order;
        $order->name=$data->name;
        $order->email=$data->email;
        $order->phone=$data->phone;
        $order->address=$data->address;
        $order->user_id=$data->user_id;
        $order->product_title=$data->product_title;
        $order->price=$data->price;
        $order->quantity=$data->quantity;
        $order->image=$data->image;
        $order->product_id=$data->product_id;
        $order->payment_status='Đã thanh toán';
        $order->delivery_status='chưa duyệt';
        $order->save();
        $cart_id=$data->id;
        $cart=cart::find($cart_id);
        $cart->delete();
      }
      Session::flash('success', 'Payment successful!');
            
      return back();



     
  }public function showorder(){

    if(Auth::id()){
   $user=Auth::user();
   $userid=$user->id;
   $order=order::where('user_id','=',$userid)->get();

      return view('home.showorder',compact('order'));
    }
  else{
    return redirect('login');
  }

  
}
  public function cancel($id){
  $order = order::find($id);
  $order->delivery_status='huy mua';
  $order->save();
  return redirect()->back();


}public function product_search(request $request){

  $search=$request->search;
  $product=product::where('title','like','%'.$search.'%')->orWhere('price','like','%'.$search.'%')->paginate(3);
  return view("home.userpage",compact('product'));
}
public function deleteh($id){$order =order::find($id);
  $order->delete();
  return redirect()->back();}
 
public function viewcateg($slug){
  $categories=Category::where('slug',$slug)->first();
  $products=Product::Where('category',$categories->id)->get();
  return view('home.viewcateg',compact('categories','products'));
}  

}

   
  
  
  

  
  
  
  
  