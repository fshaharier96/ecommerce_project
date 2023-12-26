@extends('admin.layouts.template')
@section('title','edit product')
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Product</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit current product</h5>

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
                    <form action="{{route('updateproduct')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <input hidden type="number" name="product_id" value="{{$product_info->id}}"/>
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="product_name" id="product_name" class="form-control"  value="{{$product_info->product_name}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price </label>
                            <div class="col-sm-10">
                                <input type="number" name="product_price" id="product_price" class="form-control" value="{{$product_info->price}}" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity </label>
                            <div class="col-sm-10">
                                <input type="number" name="product_qty" id="product_qty" class="form-control"   value="{{$product_info->product_qty}}"  />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short Description</label>
                            <div class="col-sm-10">
                                <textarea type="text"  cols="30" rows="10" name="product_short_des" id="product_short_des" class="form-control">{{$product_info->product_short_des}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long Description</label>
                            <div class="col-sm-10">
                                <textarea type="text"  cols="30" rows="10" name="product_long_des" id="product_long_des" class="form-control">{{$product_info->product_long_des}}</textarea>
                            </div>
                        </div>


{{--                        <div class="row mb-3">--}}
{{--                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <select name="product_category_id" id="product_category_id" class="form-select">--}}
{{--                                    @foreach($categories as $category)--}}
{{--                                        <option value="{{$category->id}}">{{$category->category_name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row mb-3">--}}
{{--                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Sub Category</label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <select name="product_subcategory_id" id="product_subcategory_id" class="form-select">--}}
{{--                                    @foreach($subcategories as $subcategory)--}}
{{--                                        <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="row mb-3">--}}
{{--                            <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Product Image</label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <input  name="product_image" class="form-control" type="file" id="formFile" />--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

