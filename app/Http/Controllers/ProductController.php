<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe;

class ProductController extends Controller
{
    public function view_product(){
        $products=Product::all();

    $products = Product::leftJoin('categories','products.category','=','categories.id')
      ->select('products.*','categories.category_name')
      ->get();
        return view('admin.product.product_all',compact('products'));

    }
    public function create_product(){
        $category=Category::all();
        return view('admin.product.product_create',compact('category'));
    }
    public function store_product(Request $request){
       $product=new Product();
       $product->title=$request->product_title;
       $product->description=$request->product_desc;
       $product->quantity=$request->product_qty;
       $product->price=$request->product_price;
       $product->discount_price=$request->disc_price;
       $product->category=$request->category_id;
       $product->title=$request->product_title;
       $image=$request->image;
       $imageName=time().'.'.$image->getClientOriginalExtension();
       $request->image->move('product',$imageName);
       $product->image= $imageName;
       $product->save();
       return redirect('/view_product')->with('message',"product added successfully");

    }
    public function edit_product($id){
       

       $products = Product::leftJoin('categories','products.category','=','categories.id')
      ->select('products.*','categories.category_name','categories.id as category_id')
      ->where('products.id','1')
      ->get();
      //return $products;
      $category=Category::all();
       return view('admin.product.product_edit',compact('products','category'));
        
    }
    public function update_product(Request $request, $id){
        $product=Product::find($id);
        // return $product;
        $product->title=$request->product_title;
        $product->description=$request->product_desc;
        $product->quantity=$request->product_qty;
        $product->price=$request->product_price;
        $product->discount_price=$request->disc_price;
        $product->category=$request->category_id;
        $product->title=$request->product_title;
        $image=$request->image;
        if($image){
        $imageName=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imageName);
        $product->image= $imageName;
        }
       
        $product->save();
        return redirect('/view_product')->with('message',"product updated successfully"); 
    }
    public function delete_product($id){
        $product=Product::find($id);
        $product->delete();
        return redirect()->back()->with('message','product deleted successfully');
    }
    public function product_details($id){
        
        $single_product=Product::findOrFail($id);

        return view('home.product_details',compact('single_product'));
    }

    public function add_cart(Request $request,$id){
        if(Auth::id()){
           $user=Auth::user();

           //dd($user);
           $product=Product::find($id);

          $cart = new Cart();
          $cart->name=$user->name;
          $cart->email=$user->email;
          $cart->phone=$user->phone;
          $cart->address=$user->address;

          $cart->user_id=$user->id;

          $cart->product_title=$product->title;
          $cart->quantity=$request->quantity;

          if($product->discount_price != null){
            $cart->price=$product->discount_price * $request->quantity ;
          }else{
            $cart->price=$product->price * $request->quantity;
          }
         
          $cart->image=$product->image;
          $cart->product_id=$product->id;
          $cart->save();
          return redirect()->back();



        }else{
            return redirect('login');
        }
    }

    public function show_cart(){
       if(Auth::user()){
        $id=Auth::user()->id;
        $cart=Cart::where('user_id','=',$id)->get();
        return view('home.showcart',compact('cart'));
       }else{
        return redirect('login');
       }
      
    }

    public function remove_cart($id){
      $cart=Cart::find($id);
      $cart->delete();
      return redirect()->back();
    } 

    public function cash_order(){
        $user_id=Auth::user()->id;
        $data=Cart::where('user_id','=',$user_id)->get();

        foreach($data as $data_val){

            $order=new Order();
            $order->name=$data_val->name;
            $order->email=$data_val->email;
            $order->phone=$data_val->phone;
            $order->address=$data_val->address;
            $order->user_id=$data_val->user_id;
            $order->product_title=$data_val->product_title;
            $order->quantity=$data_val->quantity;
            $order->price=$data_val->price;
            $order->image=$data_val->image;
           
            $order->payment_status="Cash on Devlivery";
            $order->delivery_status="Processing";
            $order->save();
            
            $cart_id=$data_val->id;

            $cart=Cart::find($cart_id);
            $cart->delete();
            
        }

        return redirect()->back()->with("message","We have received your order,we will contact you later");
        
    }

    public function stripe($totalprice){
       return view('home.stripe',compact('totalprice'));
    }
    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thank you for payment" 
        ]);
        $user_id=Auth::user()->id;
        $data=Cart::where('user_id','=',$user_id)->get();

        foreach($data as $data_val){

            $order=new Order();
            $order->name=$data_val->name;
            $order->email=$data_val->email;
            $order->phone=$data_val->phone;
            $order->address=$data_val->address;
            $order->user_id=$data_val->user_id;
            $order->product_title=$data_val->product_title;
            $order->quantity=$data_val->quantity;
            $order->price=$data_val->price;
            $order->image=$data_val->image;
           
            $order->payment_status="Paid";
            $order->delivery_status="Processing";
            $order->save();
            
            $cart_id=$data_val->id;

            $cart=Cart::find($cart_id);
            $cart->delete();
            
        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
}
