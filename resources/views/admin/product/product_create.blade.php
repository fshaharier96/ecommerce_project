<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  <style>
    .input-text{
      color:black;
    }
      .input-text:focus{
        color:white;
      }
    }
  </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
       @include('admin.sidebar')
      <!-- partial -->
        @include('admin.header')
        <!-- partial -->
         <div class='main-panel'>
            <div class='content-wrapper'>
                <div class="">
                    <h1 class="text-center">Add Product</h1>
                    <form method="post" action="{{ url('/store_product')}}" class="" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Product Title</label>
                        <input  required type="text" name="product_title" class="form-control input-text"  placeholder="Enter Product Title"/>
                       </div>
                       <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Product Description</label>
                        <textarea type="text" name="product_desc" class="form-control input-text"  placeholder="Enter Product description"/>
                            </textarea>
                       </div>
                       <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">Price</label>
                        <input required type="number"  name="product_price" class="form-control input-text" placeholder="Enter Product Price"/>
                       </div>

                       <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Discount Price</label>
                        <input type="number"  name="disc_price" class="form-control input-text" placeholder="Enter Discount Product Price"/>
                       </div>
                       <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                        <input required type="number"  name="product_qty" min="0" class="form-control input-text" placeholder="Enter Product Quantity"/>
                       </div>

                       <div class="mb-3">
                        <label  class="form-label">Category</label>
                        <select required style="color:white;" name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($category as $category_val)
                            <option value="{{ $category_val->id}}">{{ $category_val->category_name}}</option>
                            @endforeach
                        </select>
                       </div>
                       <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Product Image:</label>
                        <input type="file"  name="image" class="form-control" />
                       </div>

                      <input class="btn btn-primary" type="submit" name="submit" value="Add Product"/>
                    </form>
                </div>
            </div>
         </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>