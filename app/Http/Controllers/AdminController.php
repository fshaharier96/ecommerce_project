<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category(){
        $categories=Category::all();
        return view('admin.category.category_all',compact('categories'));
    }
    public function create_category(){
        return view('admin.category.category_create');
    }

    

    public function store_category(Request $request){
       $category=new Category();
       $category->category_name=$request->input('name');
       $category->save();
       return redirect('/view_category')->with('message','category addedd successfully');
    }

    public function edit_category($id){
        $data=Category::findOrFail($id);
        return view('admin.category.category_edit',compact('data'));
   }

   public function update_category(Request $request,$id){
    $data=Category::findOrFail($id);
    $data->category_name=$request->name;
    $data->save();
    return redirect('/view_category')->with('message',"category updated successfully");
}

public function delete_category($id){

    $data=Category::findOrFail($id);
    $data->delete();
    return redirect('/view_category')->with("message","category deleted successfully");
}
 public function orders(){
    $orders=Order::all();
    return view('admin.order.orders',compact('orders'));
 }

 public function delivered($id){
    $order=Order::find($id);
    $order->delivery_status="Delivered";
    $order->payment_status="Paid";
    $order->save();
    return redirect()->back();
 }
}
