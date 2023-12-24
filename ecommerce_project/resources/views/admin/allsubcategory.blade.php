@extends('admin.layouts.template')
@section('title','all subcategory')
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Sub Categories</h4>
        <div class="card">
            <h5 class="card-header">Product Sub Categories</h5>
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
