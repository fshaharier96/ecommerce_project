<!DOCTYPE html>
<html>
   <head>
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

          @if(session()->has('message'))
                  <div class="alert alert-success">{{session()->get('message')}}</div>
          @endif
        
   

     <div class="table-responsive w-75 mx-auto mt-4">
      <table class="table table-bordered table-striped table-hoverd">
        <thead>
            <tr>
              <th>Product Title</th>
              <th>Product Quantity</th>
              <th>Price</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php $total_price=0; ?>

            @foreach($cart as $cart_val)
            <tr>
            <td>{{$cart_val->product_title}}</td>
            <td>{{$cart_val->quantity}}</td>
            <td>৳{{$cart_val->price}}</td>
            <td>
                <img style="width:100px;" src="product/{{$cart_val->image}}"/>
            </td>
            <td>
                <a onclick="return confirm('Are you sure to remove the item?')" href="{{url('/remove_cart',$cart_val->id)}}" class="btn btn-sm btn-danger">remove</a>
            </td>
            
            </tr>
           
            <?php $total_price += $cart_val->price; ?>

          
            @endforeach
            <tr>
                <th colspan="2" class="text-right">Total Price</th>
                <th colspan="3">৳{{$total_price}}</th>
            </tr>
        </tbody>
      </table>

      <div class="text-center m-4">
        <h1 class="display:">Proceed To Checkout</h1>
        <a  href="{{url('/cash_order')}}" class="btn btn-primary text-white">Cash on Delivery</a>
        <a href="{{url('/stripe',$total_price)}}" class="btn btn-primary text-white">Pay Using Card</a>

      </div>

     
      </div>

     
      @include('home.footer')
      <!-- footer end -->
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