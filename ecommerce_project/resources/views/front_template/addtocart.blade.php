@extends('front_template.layouts.template')
@section('title','add to cart')
@section('content')
    <h1>Add to Cart</h1>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="box_main">
               <div class="table-responsive">
                     <table class="table">
                         <thead>
                          <tr>
                              <td>Product image</td>
                              <td>Product name</td>
                              <td>Quantity</td>
                              <td>Price</td>
                              <td>Action</td>
                          </tr>
                         </thead>
                         <tbody>
                         @foreach($cart_products as $products)
                             @php
                             $product_name=App\Models\Product::where('id',$products->product_id)->value('product_name');
                             $product_image=App\Models\Product::where('id',$products->product_id)->value('product_image');
                             @endphp
                         <tr>
                             <td><img style="width:60px" src="{{asset($product_image)}}"/></td>
                             <td>{{$product_name}}</td>
                             <td>{{$products->quantity}}</td>
                             <td>{{$products->price}}</td>
                             <td><a class="btn btn-warning" href="">Remove</a></td>
                         </tr>
                         @endforeach
                         </tbody>
                     </table>
               </div>
            </div>
        </div>
    </div>

@endsection
