<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
   public function category($id){
       $category=Category::findOrFail($id);
       $cat_products=Product::where('product_category_id',$id)->latest()->get();
       return view('front_template.category',compact('cat_products','category'));
   }
    public function singleProduct($id){
        $product=Product::findOrFail($id);
        $subcategory=Product::where('id',$id)->value('product_subcategory_id');
        $related_products=Product::where('product_subcategory_id',$subcategory)->latest()->get();
        return view('front_template.product',compact('product','related_products'));
    }
    public function addToCart(){
       $user_id=Auth::id();
       $cart_products=Cart::where('user_id',$user_id)->get();
        return view('front_template.addtocart',compact('cart_products'));
    }

    public function addProductToCart(Request $request){
       $product_price=$request->product_price*$request->quantity;
       Cart::insert([
           'product_id'=>$request->product_id,
           'user_id'=>Auth::id(),
           'quantity'=>$request->quantity,
           'price'=>$product_price
       ]);
       return redirect()->route('addtocart')->with('message','Product has been added to cart');
    }
    public function removeCart($id){
       Cart::findOrFail($id)->delete();
//
       return redirect()->route('addtocart')->with('message','Cart has been deleted successfully');
    }
    public function getShippingAddress(){

      return view('front_template.shippingaddress');
    }
    public function addShippingAddress(Request $request){
        $request->validate([
            'phone'=>'required',
            'city'=>'required',
            'street_address'=>'required',
            'postal_code'=>'required'
        ]);
        ShippingInfo::insert([
            'user_id'=>Auth::id(),
            'phone'=>$request->phone,
            'city'=>$request->city,
            'shipping_address'=>$request->street_address,
            'postal_code'=>$request->postal_code

        ]);

        return redirect()->route('checkout');
    }
    public function checkout(){
        $user_id=Auth::id();
        $cart_items=Cart::where('user_id',$user_id)->get();
        $shipping_address=ShippingInfo::where('user_id',$user_id)->first();
        return view('front_template.checkout',compact('cart_items','shipping_address'));
    }
    public function userProfile(){
        return view('front_template.userprofile');
    }
    public function pendingOrders(){
        return view('front_template.pendingorders');
    }
    public function history(){
        return view('front_template.history');
    }
    public function newRelease(){
        return view('front_template.newrelease');
    }
    public function todaysDeal(){
        return view('front_template.todaysdeal');
    }
    public function customerService(){
        return view('front_template.customerservice');
    }
}
