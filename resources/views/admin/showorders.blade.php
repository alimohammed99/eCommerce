





<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')

   <style type="text/css">
 

    /* td a:hover{
      color:white
    } */

    #danger:hover{
      background-color:white;
      transition:1s;
      cursor:pointer;

    }
</style>
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
 

        <div class="container-fluid page-body-wrapper">


          <div class="container" align="center" style="text-align:center; margin-top:35px">

          @if(session()->has('message'))

<div class="alert alert-success alert-dismissible">
  <button class="close" type="button" data-dismiss="alert">X</button>
  {{session()->get('message')}}
</div>

@endif 


          <h1 style="color:black; font-style:italic; font-family:broadway; font-size:32px; margin-top:30px; background-color:tomato; padding:15px; margin-bottom:52px">CUSTOMERS' ORDERS</h1>


<div class="table-responsive">

          <table class="table table-dark table-striped table-bordered" style="text-align:center; margin-top:3px">
            <tr>
                <th style="color:tomato">Customer Name</th>
                <th style="color:tomato">Phone Number</th>
                <th style="color:tomato">Address</th>
                <th style="color:tomato">Product Title</th>
                <th style="color:tomato">Price</th>
                <th style="color:tomato">Quantity</th>
                <th style="color:green">STATUS</th>
                <th colspan="2" style="color:tomato">Action</th>
            </tr>

            @foreach($order as $orders)

            <tr>
                <td>{{$orders->name}}</td>
                <td>{{$orders->phone}}</td>
                <td>{{$orders->address}}</td>
                <td>{{$orders->product_name}}</td>
                <td>{{$orders->price}}</td>
                <td>{{$orders->quantity}}</td>
                <td>{{$orders->status}}</td>
                <td id="danger"><a href="{{url('approveorderstatus', $orders->id)}}" class="btn btn-success">Approve Order</a></td>
                <td id="danger"><a href="{{url('unapproveorderstatus', $orders->id)}}" class="btn btn-danger">Unapprove Order</a></td>
            </tr>

            @endforeach

        </table>
        </div>














          </div>

          </div>
        

       
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>