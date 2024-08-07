<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <!-- <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div> -->
            <!-- <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div> -->
          </div>
        </div>
      </div>
    
       @include('admin.sidebar')

        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">
                <h1 style="font-size:30px;" class="mb-4">All Orders</h1>
                <div class="alert alert-success success-msg" style="display:none;">Delivery Status Has Changed</div>
                <div class="flex">
                  <input style="height:40px;color:black;" type="text" class="search_input mb-4" placeholder="Search Order"/>
                  <button style="height:40px;" class="btn btn-primary search_btn">search</button>
                </div>

                <div class="table-responsive all_view">
                        <table class="table table-hover table-bordered text-light">
                            <thead>
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Product Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Payment Status</th>
                                    <th>Delivery Status</th>
                                    <th>Image</th>
                                    <th>Delivered</th>
                                    <th>Print PDF</th>
                                    <th>Notification</th>
                                </tr>
                            </thead>
                            <tbody>

                             @php 
                             $i=0;
                             @endphp
                             @foreach($orders as $order) 

                             @php 
                             
                             $i++;
                             @endphp
                            <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->product_title}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->price}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>{{$order->delivery_status}}</td>
                                    <td>
                                        <img src="product/{{$order->image}}"/>
                                    </td>
                                    <td>
                                        @if($order->delivery_status==="Processing")
                                              <a class="btn btn-primary delivered" data-id="{{$order->id}}"   href="#">Delivered</a>
                                              <p class="text-success alt-text" style="display:none;">Delivered</p>
                                        @else
                                             <p class="text-success">Delivered</p>

                                        @endif
                                    </td>

                                    <td>
                                      <a href="{{url('/order_pdf',$order->id)}}" class="btn btn-info">PDF</a>
                                    </td>

                                    <td>
                                    <a href="{{url('/send_email',$order->id)}}" class="btn btn-warning">send email</a>

                                    </td>

                                   
                                   
                            </tr>

                            @endforeach 
                              
                            </tbody>
                        </table>
                </div>

                <div class="search_view"></div>

            </div>

        </div>
 
        @include('admin.script')



        <script>
         $('.delivered').click(function(e){
             e.preventDefault();
             //alert("this is delivered button");
             var order_id=$(this).data('id')
             var button=$(this);
             $.ajax({
              url:"{{route('orders.delivered')}}",
              method:'GET',
              data:{"order_id":order_id},
              success:function(response){
                button.hide();
                button.next('p').show();
                $(".success-msg").show();

                setTimeout(function(){
                  $(".success-msg").fadeOut('slow')
                },3000)
              }

             })
            
         })

         $('.search_btn').click(function(){
           var search_text=$('.search_input').val();
           if(search_text){
           $.ajax({
            url:"{{ route('order_search') }}",
            method:"GET",
            data:{"search_text":search_text},
            success:function(response){
              $('.all_view').hide();
               $('.search_view').html(response.html);
               
            },
           })
          }else{
            alert('Search field is empty')
          }
         })

         
          

        </script>
   
  </body>
</html>

