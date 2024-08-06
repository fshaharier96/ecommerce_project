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
                    <h2>Edit Category</h2>
                    <form method="post" action="{{ url('/update_category/'.$data->id)}}" class="form-control">
                      @csrf
                      <input class="form-control input-text mb-2" name="name" type="text" placeholder="Enter Category Name" value="{{$data->category_name}}"/>
                      <input class="btn btn-primary" type="submit" name="submit" value="submit"/>
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