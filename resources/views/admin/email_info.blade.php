<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  <style>
    label{
        width:150px;
    }
    .input-div{
        margin:8px 0px;
    }
    input{
        color:black !important;
    }
  </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <!-- <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div> -->
            <!-- <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div> -->
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
       @include('admin.sidebar')
     
        @include('admin.header')


       
       
       <div class="main-panel">
        <div class="content-wrapper">
            <h1 style="font-size:30px;" class="text-center">Send Email To {{$order->email}}</h1>
            
            <form method="post" action="{{url('/send_user_email',$order->id)}}" class="mx-auto border border-1 w-1/2 flex items-center justify-center flex-col p-3">
                @csrf
                <div   class="input-div">
                   <label>Email Greeting : </label>
                   <input type="text" name="greeting"/>
                </div>
                <div class="input-div">
                   <label>Email FirstLine: </label>
                   <input type="text" name="firstline"/>
                </div>
                <div  class="input-div">
                   <label>Email Body : </label>
                   <input type="text" name="body"/>
                </div>
                <div  class="input-div">
                   <label>Email Button Name : </label>
                   <input type="text" name="button"/>
                </div>
                <div  class="input-div">
                   <label>Email Url : </label>
                   <input type="text" name="url"/>
                </div>

                <div  class="input-div">
                   <label>Email Last Line : </label>
                   <input type="text" name="lastline"/>
                </div>
                <div  class="input-div">
                  
                   <input type="submit" class="btn btn-primary" name="submit"/>
                </div>
            </form>

        </div>
       </div>


  
        @include('admin.script')
  
  </body>
</html>