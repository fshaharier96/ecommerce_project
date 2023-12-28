<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
        return view('front_template.addtocart');
    }
    public function checkout(){
        return view('front_template.checkout');
    }
    public function userProfile(){
        return view('front_template.userprofile');
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
