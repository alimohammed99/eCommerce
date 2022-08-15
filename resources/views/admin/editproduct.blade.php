





<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
   @include('admin.css')
  </head>
  <body style="overflow-x:auto">
    <div class="container-scroller">
      <!-- <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between"> -->
            <!-- <div class="ps-lg-1"> -->
              <!-- <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div> -->
            <!-- </div> -->
            <!-- <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div> -->
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
      



        <div class="container" align="center" style="text-align:center; margin-top:35px">
        <h1 class="title" style="color:white; font-size:25px; text-align:center">EDIT PRODUCT</h1> <br><br>


        @if(session()->has('message'))
          <div class="alert alert-success alert-dismissible">
            <button class="close" type="button" data-dismiss="alert">x</button>
            {{session()->get('message')}}
          </div>
        @endif

        
        <form style"width:50%" class="form" action="{{url('updateproduct', $data->id)}}" method="post" enctype="multipart/form-data">
          @csrf

        <div class="form-group">
         
          <input style="color:tomato;" class="form-control" value="{{$data->title}}" type="text" name="title"required>
        </div>

       <div class="form-group">
       
          <input style="color:tomato" class="form-control" value="{{$data->price}}" type="number" name="price" required>
        </div>

       <div class="form-group">
      
          <input style="color:tomato" class="form-control" value="{{$data->description}}" type="text" name="description" required>
        </div>

       <div class="form-group">
      
          <input style="color:tomato" class="form-control" value="{{$data->quantity}}" type="text" name="quantity" required>
        </div>

       <div class="form-group">
         <!-- <label for="img">Old Image</label> -->
         <img height="300" width="300" src="/productimage/{{$data->image}}" alt="">
       </div>

       <div class="form-group">
         <label for="imgg"><span style="font-size:22px">Change Image</span></label> <br> <br>
         <input type="file" name="file">
       </div>

       <div class="form-group">
          <input style="background-color:" type="submit" class="btn btn-success" value="Submit">
        </div>


        </form>


</div>









          <!-- partial -->
        </div>
        <!-- main-panel ends -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>