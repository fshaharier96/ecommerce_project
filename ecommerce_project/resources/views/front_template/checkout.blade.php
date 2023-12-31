@extends('front_template.layouts.template')
@section('title','checkout')
@section('content')
   <div class="row">
       <div class="col-5">
           <div class="box_main">
            <h2>Product will be sent at-</h2>
               <p>Contact number : {{$shipping_address->phone}}</p>
               <p>Delivery address : {{$shipping_address->shipping_address}}</p>
               <p>City: {{$shipping_address->city}}, Postal-Code: {{$shipping_address->postal_code}}</p>
           </div>
       </div>
       <div class="col-7">
           <div class="box_main">
               <h2>Your Final Proudcts are -</h2>
               <div class="table-responsive">
                   <table class="table">
                       <thead>
                       <tr>
                           <td>Product image</td>
                           <td>Product name</td>
                           <td>Quantity</td>
                           <td>Price</td>
                       </tr>
                       </thead>
                       <tbody>
                       @php
                           $total=0;
                       @endphp
                       @foreach($cart_items as $products)
                           @php
                               $product_name=App\Models\Product::where('id',$products->product_id)->value('product_name');
                               $product_image=App\Models\Product::where('id',$products->product_id)->value('product_image');
                           @endphp
                           <tr>
                               <td><img style="width:60px" src="{{asset($product_image)}}"/></td>
                               <td>{{$product_name}}</td>
                               <td>{{$products->quantity}}</td>
                               <td>{{$products->price}}</td>
                           </tr>
                           @php
                               $total=$total+$products->price;
                           @endphp
                       @endforeach
                       <tr>

                           <td></td>
                           <td class="fw-bolder">Total price :</td>
                           <td>{{$total}}</td>
                       </tr>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
       <form action="" method="post" class="mr-2">
           @csrf
          <input type="submit" value="Place Order" class="btn btn-info"/>
       </form>

       <form action="" method="post">
           @csrf
           <input type="submit" value="Cancel Order" class="btn btn-danger"/>
       </form>
   </div>

@endsection
