
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')



<style type="text/css">
  label{
    display:inline;
    width:200px;
  }
</style>

  </head>
  <body>
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
        <div class="container-fluid page-body-wrapper">


        <div class="container" align="center" style="text-align:center; margin-top:35px">
        <h1 style="color:black; font-style:italic; font-family:broadway; font-size:32px; margin-top:30px; background-color:tomato; padding:15px; margin-bottom:52px">ADD NEW PRODUCT</h1>



        @if(session()->has('message'))
          <div class="alert alert-success alert-dismissible">
            <button class="close" type="button" data-dismiss="alert">x</button>
            {{session()->get('message')}}
          </div>
        @endif
        


        <form style"width:50%" class="form" action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
          @csrf

        <div class="form-group">
          <label for="title">Product title</label>
          <input style="color:tomato;" class="form-control" type="text" name="title" placeholder="Give the product title" required>
        </div>

       <div class="form-group">
        <label for="price">Product price</label>
          <input style="color:tomato" class="form-control" type="number" name="price" placeholder="Write the price" required>
        </div>

       <div class="form-group">
        <label for="description">Product Description</label>
          <input style="color:tomato" class="form-control" type="text" name="description" placeholder="Give the product description" required>
        </div>

       <div class="form-group">
        <label for="title">Quantity</label>
          <input style="color:tomato" class="form-control" type="text" name="quantity" placeholder="Product Quantity" required>
        </div>

        <div class="form-group">
        <label for="title">Product Type</label>
          <input style="color:tomato" class="form-control" type="text" name="type" placeholder="Product Type" required>
        </div>

       <div class="form-group">
          <input class="form-control" type="file" name="file" required>
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