<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use PDF;
class Admincontroller extends Controller
{
    public function view(){
        $categories=category::all();

        return view('admin.cat',compact('categories'));
    }


    public function add_cat(Request $request){
       $categories= new category;
       $categories->category_name=$request->category;
       $categories->slug=$request->slug;
       $categories->save();
       return redirect()->back()->with('message','add thanh cong');
    }

    public function delete($id){
        $categories=category::find($id);
        $categories->delete();
        return redirect()->back()->with('message','delete thanh cong');

    }
    public function pro(){
        $category= category::all();
        return view('admin.pro',compact('category'));
    }
    public function addpro(Request $request){

$products=new product;
$products->title=$request->title;
$products->description=$request->descript;

$products->price=$request->price;

$products->quantity=$request->quantity;
$products->discount_price=$request->dis_price;
$products->category=$request->category;
$image=$request ->image;
$imagename=time().'.'.$image->getClientOriginalExtension();
$request->image->move('product',$imagename);
$products->image=$imagename;
$products->save();
return redirect()->back()->with('message',' thanh cong');



    }
public function showpro(){
    $products=product::all();
    return view('admin.showpro',compact('products'));
}
Public function deletepro($id){
    $products =product::find($id);
    $products->delete();
    return redirect()->back()->with('message', 'xoa thanh cong');
}
public function editpro($id){
    $products=product::find($id);
    $category=category::all();
    return view('admin.editpro',compact('products','category'));
}
public function edit(request $request ,$id){
    $products=product::find($id);
    $products->title=$request->title;
    $products->title=$request->slug;
    $products->description=$request->description;
    $products->price=$request->price;
    $products->quantity=$request->quantity;
    $products->discount_price=$request->dis_price;
    $products->category=$request->category;

    $image=$request->image;
    if($image){

    
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->image->move('product',$imagename);
    $products->image=$imagename;}
    $products->save();
return redirect()->back()->with('message', 'sua thanh cong');;

}
public function search(Request $request){
    $search=$request->search;
    $products=product::where('title','like','%'.$search.'%')->orWhere('category','like','%'.$search.'%')->orWhere('price','like','%'.$search.'%')->get();
    return view('admin.showpro',compact('products'));

} public function order(){
    $order=order::all();
return view('admin.order',compact('order'));
}public function deli($id){
    $order=order::find($id);
    $order->delivery_status="duyet";
    $order->payment_status='đã thanh toán';
    $order->save();
    return redirect()->back();

} Public function deleteorder($id){
    $order =order::find($id);
    $order->delete();
    return redirect()->back()->with('message', 'xoa thanh cong');
}Public function in($id){
    $order=order::find($id);
$pdf=PDF::loadView('admin.pdf',compact('order'));
return $pdf->download('order_details.pdf');
}
Public function searcho(Request $request){
    $search=$request->search;
  $order=order::where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%')->orWhere('phone','like','%'.$search.'%')->orWhere('address','like','%'.$search.'%')->get();
  return view('admin.order',compact('order'));

}

}