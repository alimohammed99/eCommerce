<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>ALBASS Clothing</title>

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>ALBASS <em>Clothing</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{url('/ourproducts')}}">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/aboutus')}}">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('contactus')}}">Contact Us</a>
              </li>


        <li class="nav-item">
              @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth

                    <li class="nav-item">
                <a style="color:white; background-color:tomato" class="nav-link" href="{{url('showcart')}}"><i class="fas fa-shopping-cart"></i>  Cart [ {{$count}} ]  </a>
              </li>
                       
                          <x-app-layout>

                          </x-app-layout>
                     
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                        @if (Route::has('register'))
                            <li><a class="nav-link" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li> 
                        @endif
                    @endauth
                </div>
            @endif

        </li>


            </ul>
          </div>
        </div>
      </nav>




      @if(session()->has('message'))

<div class="alert alert-success alert-dismissible">
  <button class="close" type="button" data-dismiss="alert">X</button>
  {{session()->get('message')}}
</div>

@endif 


    </header>

   <body>
       
  

 
        
  
<div style="padding:100px;" align="center">



<h1 style="color:black; font-style:italic; font-family:broadway; font-size:32px; margin-top:30px; background-color:tomato; padding:15px; margin-bottom:52px">MY CARTS</h1>

<table class="table table-hover table-striped table-bordered table-dark" style="text-align:center; margin-top:3px">
    <tr>
        <th style="color:tomato">Product Name</th>
        <th style="color:tomato">Quantity</th>
        <th style="color:tomato">Price</th>
        <th style="color:tomato">Action</th>
    </tr>


<form action="{{url('confirmorder')}}" method="POST">
@csrf


    @foreach($cart as $carts)

    <tr>
        <td>
          <input type="text" name="productname[]" value="{{$carts->product_title}}" hidden>
          {{$carts->product_title}}
        </td>

        <td>
        <input type="text" name="quantity[]" value="{{$carts->quantity}}" hidden>
          {{$carts->quantity}}
        </td>

        <td>
        <input type="text" name="price[]" value="{{$carts->price}}" hidden>
          {{$carts->price}}
        </td>
        <td><a href="{{url('deletecart', $carts->id)}}" class="btn btn-danger">Remove<a> </td>
    </tr>

    @endforeach




</table>


<button class="btn btn-success">Confirm Order</button>
</form>

</div>












   


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
