@extends('admin.layouts.template')
@section('title','all subcategory')
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Sub Categories</h4>
        <div class="card">
            <h5 class="card-header">Product Sub Categories</h5>
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
                        <th>Sub Category Name</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($subcategories as $subcategory)
                    <tr>
                        <td>{{$subcategory->id}}</td>
                        <td>{{$subcategory->subcategory_name}}</td>
                        <td>{{$subcategory->category_name}}</td>
                        <td></td>
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
