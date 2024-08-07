
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