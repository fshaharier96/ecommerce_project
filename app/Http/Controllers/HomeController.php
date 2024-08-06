<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class HomeController extends Controller
{
  
     public function index(){
        $product=Product::all();
        return view('home.userpage',compact('product'));
     }
    public function redirect(){
        $userType=Auth::user()->usertype;
        if( $userType==='1'){
            return view('admin.home');
        }else{
        $product=Product::all();
        return view('home.userpage',compact('product'));
        }
    }
}
