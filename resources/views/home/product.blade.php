<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               @foreach($product as $product_val)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$product_val->id)}}" class="option1">
                            Product Details
                           </a>
                           <form method="post" action="{{url('/add_cart',$product_val->id)}}">
                              @csrf
                              
                                   <div class="d-flex mt-3">
                                    <input style="background:#D8ffff; border:none;width:70px;height:40px;border-radius:30px 0px 0px 30px" type="number" name="quantity" value="1" min="1" />
            
                                     <button class="text-white"  style="background:#002C3E;width:110px;height:40px;border:none;border-radius:0px 30px 30px 0px" type="submit">Add to Cart</button>
                                    </div>
                            
                           </form>
                         
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{ $product_val->image }}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        {{ $product_val->title }}
                        </h5>
                       
                       
                        @if($product_val->discount_price)
                        <h6 class="ml-2">
                        ৳{{ $product_val->discount_price }} 
                        </h6>
                        <h6 style="text-decoration:line-through;color:red;" class="ml-2">
                        ৳{{ $product_val->price }} 
                        </h6>
                        @else
                        <h6 class="ml-2">
                        ৳{{ $product_val->price }} 
                        </h6>

                        @endif
                     </div>
                  </div>
               </div>
               @endforeach
              
              
            </div>
            <!-- <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div> -->
         </div>
      </section>