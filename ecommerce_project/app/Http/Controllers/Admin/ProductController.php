<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view('admin.allproduct',compact('products'));
    }
    public function addProduct(){
        $categories=Category::latest()->get();
        $subcategories=Subcategory::latest()->get();

        return view('admin.addproduct',compact('categories','subcategories'));
    }
    public function storeProduct(Request $request){
       $request->validate([
           'product_name'=>'required|unique:products',
           'product_price'=>'required',
           'product_qty'=>'required',
           'product_short_des'=>'required',
           'product_long_des'=>'required',
           'product_category_id'=>'required',
           'product_subcategory_id'=>'required',
           'product_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
       ]);

       $image=$request->file('product_image');
       $image_name=hexdec(uniqid()).".".$image->getClientOriginalExtension();
       $request->product_image->move(public_path('upload'),$image_name);
       $image_url='upload/'.$image_name;

       $category_id=$request->product_category_id;
       $subcategory_id=$request->product_subcategory_id;

       $category_name=Category::where('id',$category_id)->value('category_name');
       $subcategory_name=Subcategory::where('id',$subcategory_id)->value('subcategory_name');

       Product::insert([
           'product_name'=>$request->product_name,
           'product_short_des'=>$request->product_short_des,
           'product_long_des'=>$request->product_long_des,
           'price'=>$request->product_price,
           'product_category_name'=> $category_name,
           'product_subcategory_name'=> $subcategory_name,
           'product_category_id'=> $category_id,
           'product_subcategory_id'=>$subcategory_id,
           'product_image'=>$image_url,
           'product_qty'=>$request->product_qty,
           'slug'=>strtolower(str_replace(' ','-',$request->product_name)),
       ]);

        Category::where('id',$category_id)->increment('product_count',1);
        Subcategory::where('id',$subcategory_id)->increment('product_count',1);
        return redirect()->route('allproduct')->with('message','Product added successfully');
    }

     public function editProductImg($id){
        $product_info=Product::findOrFail($id);
        return view('admin.editproductimg',compact('product_info'));

     }
     public function updateProductImg(Request $request){
         $request->validate([
             'product_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);

         $image=$request->file('product_image');
         $image_name=hexdec(uniqid()).".".$image->getClientOriginalExtension();
         $request->product_image->move(public_path('upload'),$image_name);
         $image_url='upload/'.$image_name;

         $product_id=$request->product_id;
         Product::findOrFail($product_id)->update([
             'product_image'=>$image_url
         ]);
         return redirect()->route('allproduct')->with('message','Product image updated successfully');
     }
     public function editProduct($id){
        $product_info=Product::findOrFail($id);
        return view('admin.editproduct',compact('product_info'));
     }
     public function updateProduct(Request $request){
         $product_id=$request->product_id;
         $request->validate([
             'product_name'=>'required',
             'product_price'=>'required',
             'product_qty'=>'required',
             'product_short_des'=>'required',
             'product_long_des'=>'required',
         ]);

         Product::findOrFail($product_id)->update([
             'product_name'=>$request->product_name,
             'product_short_des'=>$request->product_short_des,
             'product_long_des'=>$request->product_long_des,
             'price'=>$request->product_price,
             'product_qty'=>$request->product_qty,
             'slug'=>strtolower(str_replace(' ','-',$request->product_name)),
         ]);
         return redirect()->route('allproduct')->with('message','Product updated successfully');
     }
     public function deleteProduct($id){
        $category_id=Product::where('id',$id)->value('product_category_id');
        $subcategory_id=Product::where('id',$id)->value('product_subcategory_id');
        Product::findOrFail($id)->delete();
        Category::where('id',$category_id)->decrement('product_count',1);
        Subcategory::where('id',$subcategory_id)->decrement('product_count',1);
         return redirect()->route('allproduct')->with('message','Product deleted successfully');

     }

}
