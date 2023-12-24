@extends('admin.layouts.template')
@section('title','all product')
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Products</h4>
        <div class="card">
            <h5 class="card-header">Available Products</h5>
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
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a  class="btn  btn-primary" href="">Edit</a>
                            <a  class="btn btn-danger" href="">Delete</a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
