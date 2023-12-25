@extends('admin.layouts.template')
@section('title','edit subcategory')
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Sub Category</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit current subcategory</h5>
                    <small class="text-muted float-end">input information</small>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('updatesubcategory')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <input  hidden type="number" name="subcategory_id" value="{{$subcategory->id}}"/>
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="subcategory_name" id="subcategory_name" class="form-control" value="{{$subcategory->subcategory_name}}"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                            <div class="col-sm-10">
                                <select disabled name="category_id" id="category_id" class="form-select">
                                        <option value="{{$subcategory->category_id}}">{{$subcategory->category_name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Subcategory</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
