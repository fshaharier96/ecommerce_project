@extends('admin.layouts.template')
@section('title','all product')
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Products</h4>
        <div class="card">
            <h5 class="card-header">Available Products</h5>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->product_name}}</td>
                        <td><img style="width:100px;" src="{{asset($product->product_image)}}" alt="{{$product->product_name}}"/>
                            <br/><br/>
                            <a href="{{route('editproductimg',$product->id)}}" class="btn-sm btn-primary">update image</a>
                        </td>
                        <td>{{$product->price}}</td>
                        <td>
                            <a  class="btn  btn-primary" href="">Edit</a>
                            <a  class="btn btn-danger" href="">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
