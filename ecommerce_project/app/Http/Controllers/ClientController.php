<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
   public function category(){
       return view('front_template.category');
   }
    public function singleProduct(){
        return view('front_template.product');
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
