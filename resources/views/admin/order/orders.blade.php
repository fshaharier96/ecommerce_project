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
                <div class="table-responsive">
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
                                              <a class="btn btn-primary" href="{{url('/delivered',$order->id)}}">Delivered</a>
                                        @else
                                             <p class="text-success">Delivered</p>

                                        @endif
                                    </td>

                                   
                                   
                            </tr>

                            @endforeach 
                              
                            </tbody>
                        </table>
                    </div>

            </div>

        </div>
 
        @include('admin.script')
   
  </body>
</html>