@extends('front_template.layouts.template')
@section('title','single product page')
@section('content')
   <div class="container p-5">
       <div class="row">
           <div class="col-lg-4">
               <div class="box_main">
                   <div class="tshirt_img"><img src="{{asset($product->product_image)}}"/></div>
               </div>

           </div>
           <div class="col-lg-8">
               <div class="box_main">
                   <div class="product-info">
                       <h4 class="shirt_text text-left pl-3">{{$product->product_name}}</h4>
                       <p class="price_text text-left pl-3">Price <span style="color:#262626">{{$product->price}} Tk</span></p>
                   </div>
                   <div class="product-details my-3">
                       <p class="text-left">{{$product->product_long_des}}</p>
                   </div>
                   <div class="bg-light pl-3">
                       <ul>
                           <li>Category-{{$product->product_category_name}}</li>
                           <li>Subcategory-{{$product->product_subcategory_name	}}</li>
                           <li>Quantity-{{$product->product_qty}}</li>
                       </ul>
                   </div>
                   <div class="btn_main mt-2 ">
                      <div class="">
                         <form action="{{route('addproducttocart')}}" method="post">
                             @csrf
                             <input  hidden type="text" value="{{$product->id}}" name="product_id"/>
                             <div class="form-group">
                                 <label for="product_id">Order Quantity</label>
                                 <input class ="form-control" type="number"  min='1' max="{{$product->product_qty}}"  placeholder="1" name="product_id" id="product_id" />
                             </div>

                             <input type="submit" class="btn btn-warning" value="Add to cart"/>
                         </form>
                      </div>
                   </div>

               </div>
           </div>
       </div>
       <div class="row">
           <!-- fashion section start -->
           <div class="fashion_section">
               <div id="main_slider" class="carousel slide" data-ride="carousel">
                   <div class="carousel-inner">
                       <div class="carousel-item active">
                           <div class="container">
                               <h1 class="fashion_taital">Related Products</h1>
                               <div class="fashion_section_2">
                                   <div class="row">
                                       @foreach($related_products as $product)
                                           <div class="col-lg-4 col-sm-4">
                                               <div class="box_main">
                                                   <h4 class="shirt_text">{{$product->product_name}}</h4>
                                                   <p class="price_text">Price  <span style="color: #262626;">{{$product->price}} Tk</span></p>
                                                   <div class=""><img style="height:300px" src="{{asset($product->product_image)}}"></div>
                                                   <div class="btn_main mt-3">
                                                       <div class="buy_bt">
                                                           <div class="">
                                                               <form action="{{route('addproducttocart')}}" method="post">
                                                                   @csrf
                                                                   <input  hidden type="text" value="{{$product->id}}" name="product_id"/>
                                                                   <input type="submit" class="btn btn-warning" value="Buy now"/>
                                                               </form>
                                                           </div>
                                                       </div>
                                                       <div class="seemore_bt"><a href="{{route('singleproduct',[$product->id,$product->slug])}}">See More</a></div>
                                                   </div>
                                               </div>
                                           </div>
                                       @endforeach

                                   </div>
                               </div>
                           </div>
                       </div>

                   </div>
                   <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                       <i class="fa fa-angle-left"></i>
                   </a>
                   <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                       <i class="fa fa-angle-right"></i>
                   </a>
               </div>
           </div>
           <!-- fashion section end -->
       </div>
   </div>
@endsection
