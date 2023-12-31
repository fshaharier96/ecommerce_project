@extends('front_template.layouts.template')
@section('title','checkout')
@section('content')
   <div class="row p-3">
       <h2 class="p-4">Shipping Address</h2>
       <div class="col-12 p-4">
           <div class="box_main">
               <form action="{{route('addshippingaddress')}}" method="post" class="p-4" class="form-control">
                   @csrf
                  <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="tel" name="phone" class="w-100" id="phone"/>
                  </div>
                   <div class="form-group">
                       <label for="city">City</label>
                       <input type="text" name="city" class="w-100" id="city"/>
                   </div>
                   <div class="form-group">
                       <label for="street_address">Street address</label>
                       <input type="text" name="street_address" class="w-100" id="street_address"/>
                   </div>

                   <div class="form-group">
                       <label for="postal_code">Postal code</label>
                       <input type="text" name="postal_code" class="w-100" id="postal_code"/>
                   </div>
                   <input type="submit"  value="Next" class="btn btn-info"/>
               </form>
           </div>
       </div>
   </div>
@endsection
