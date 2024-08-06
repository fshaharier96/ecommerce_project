<!DOCTYPE html>
<html>
   <head>
    <base href="/public" />
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
        
          @include('home.header')
         
        
     

      <div class="col-sm-6 col-md-4 col-lg-4" style="width:50%;margin:auto;padding:30px;">
                  <div class="box">
                    
                     <div class="img-box">
                        <img style="width:300px;padding:20px;" src="product/{{ $single_product->image }}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        {{ $single_product->title }}
                        </h5>
                       
                       
                        @if($single_product->discount_price)
                        <h6 class="ml-2">
                        ৳{{ $single_product->discount_price }} 
                        </h6>
                        <h6 style="text-decoration:line-through;color:red;" class="ml-2">
                        ৳{{ $single_product->price }} 
                        </h6>
                        @else
                        <h6 class="ml-2">
                        ৳{{ $single_product->price }} 
                        </h6>

                        @endif
                        
                            @php
                                use Illuminate\Support\Facades\DB;
                                $users = DB::table('categories')->where('id','=',$single_product->category)->first();
                                 
                            @endphp

                        <h6>Product Category :{{ $users->category_name  }}</h6>
                        <h6>Product Details : {{$single_product->description}}</h6>
                        <h6 class="mb-3">Available Quantity :{{$single_product->quantity}}</h6>

                       <form method="post" action="{{url('/add_cart',$single_product->id)}}">
                              @csrf
                              
                                   <div class="d-flex mt-3">
                                    <input style="background:#D8ffff; border:none;width:70px;height:40px;" type="number" name="quantity" value="1" min="1" />
            
                                     <button class="text-white"  style="background:#002C3E;width:110px;height:40px;border:none;" type="submit">Add to Cart</button>
                                    </div>
                            
                           </form>
                     </div>
                  </div>
               </div>
     
 
      @include('home.footer')


     
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>