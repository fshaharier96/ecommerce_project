<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Notifications\SendEmailNotification;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
// use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
// use Barryvdh\DomPDF\PDF;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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

 public function delivered(){
    if($_GET){
        $id=$_GET['order_id'];
    }
    $order=Order::find($id);
    $order->delivery_status="Delivered";
    $order->payment_status="Paid";
    $order->save();
    echo "success";
 }
  
    public function order_pdf($id){
        $order=Order::find($id);
       $pdf=FacadePdf::loadView("admin.pdf",compact('order'));
      
       return $pdf->download('order_details.pdf');
    }

    public function send_email($id){
        $order=Order::find($id);
        return view('admin.email_info',compact('order'));
    }

    public function send_user_email(Request $request,$id){
        $order=Order::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,
        ];
        Notification::send($order,new SendEmailNotification($details));
        return redirect()->back();
    }

    public function order_search(){
        if($_GET){
         $search_text=$_GET['search_text'];
         $orders=Order::where('name','LIKE',"%$search_text%")->get();
         
         $html= view('admin.order.order_search',compact('orders'))->render();
         return response()->json(['html' => $html]);
        }
    }
}
