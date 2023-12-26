@extends('admin.layouts.template')
@section('title','edit product image')
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Edit Product Image</h4>
        <div class="col-xxl">
            <div class="card mb-4">
{{--                <div class="card-header d-flex align-items-center justify-content-between">--}}
{{--                    <h5 class="mb-0">Add new product</h5>--}}

{{--                    <small class="text-muted float-end">input information</small>--}}
{{--                </div>--}}
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
                    <form action="{{route('updateproductimg')}}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Previous Image</label>
                            <div class="col-sm-10">
                               <img  style="width:200px" src="{{asset($product_info->product_image)}}" alt="{{$product_info->product_name}}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <input hidden type="number" name="product_id" value="{{$product_info->id}}"/>
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Upload New Image</label>
                            <div class="col-sm-10">
                                <input  name="product_image" class="form-control" type="file" id="formFile" />
                            </div>
                        </div>


                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Product Image</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

