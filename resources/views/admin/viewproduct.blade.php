





<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')

<style type="text/css">
    body{
        overflow-x:scroll;
    }

    td a:hover{
      /* background-color:red; */
      /* padding:15px; */
      color:white
    }

    #danger:hover{
      background-color:white;
      transition:1s;
      cursor:pointer;
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
          <!-- partial -->



<div class="table-responsive">



       @if(session()->has('message'))

       <div class="alert alert-success alert-dismissible">
         <button class="close" type="button" data-dismiss="alert">X</button>
         {{session()->get('message')}}
       </div>

       @endif

       <h1 style="color:black; font-style:italic; font-family:broadway; font-size:32px; margin-top:30px; background-color:tomato; padding:15px; margin-bottom:52px">ALL PRODUCTS</h1>



                <table class="table table-dark table-striped table-bordered"style="color:white">
                    <tr>
                        <th style="color:tomato">TITLE</th>
                        <th style="color:tomato">DESCRIPTION</th>
                        <th style="color:tomato">IMAGE</th>
                        <th style="color:tomato">PRICE</th> 
                        <th  style="color:tomato">QUANTITY</th>
                        <th colspan="2" style="color:tomato">ACTION</th>
                    </tr>



                @foreach($data as $product)



                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
             <td>  <img class="" height="500" width="500" src="/productimage/{{$product->image}}">  </td>
                        <td>₦{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td id="danger"><a class="btn btn-primary" href="{{url('editproduct', $product->id)}}">Edit</a></td>
                        <td id="danger"><a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{url('deleteproduct', $product->id)}}">Delete</a></td>
                    </tr>


                    @endforeach

                </table>

</div>




        </div>

    </div>
        <!-- main-panel ends -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>