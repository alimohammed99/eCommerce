<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>ALBASS Clothing</title>

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

    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="text-content">
                <h4>new arrivals</h4>
                <h2>Albass products</h2>
              </div>
            </div>
          </div>
        </div>
      </div>

    
      <div class="products">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="filters">
                <ul>
                    <li class="active" data-filter="*">All Products</li>
                    <li data-filter=".des">Featured</li>
                    <li data-filter=".dev">Flash Deals</li>
                    <li data-filter=".gra">Last Minute</li>
                </ul>
              </div>
            </div>
            <div class="col-md-12">
              <div class="filters-content">
                  <div class="row grid">
  
   <!-- <div class="row grid"> -->
                  @foreach($data as $product)
                  <div class="col-lg-4 col-md-4 all">
                    <div class="product-item">
                    <img width="70" src="/productimage/{{$product->image}}" alt="">
                      <div class="down-content">
                          <h4>{{$product->title}}</h4>
                          <h6 style="color:" class="text-danger">₦{{$product->price}}</h6>    
                          <p class="text-danger">{{$product->description}}</p>

                          <form class="form" action="{{url('addcart', $product->id)}}" method="POST">
                              @csrf
                              <div class="form-group">
                                Choose quantity
                              <input name="quantity" type="number" style="width:100p x" value="1" min="1" class="form-control">
                              </div>
                              <div class="form-group">
                                <input type="submit" style="background-color:blue; opacity:0.8" class="btn btn-primary" value="Add to Cart">
                              </div>
                          </form>
                          <p class="text-danger text-bolder"><b>Available in stock:  ({{$product->quantity}})</b></p>
                        <ul class="stars">
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Reviews ({{rand(30,60) }})</span>
                      </div>
                    </div>
                  </div>
                  @endforeach
<!-- </div> -->
  
  
<!-- <div class="row grid"> -->
                  @foreach($datafeatured as $product)
                    <div class="col-lg-4 col-md-4 all des">
                    <div class="product-item">
                    <img width="70" src="/productimage/{{$product->image}}" alt="">
                      <div class="down-content">
                          <h4>{{$product->title}}</h4>
                          <h6 class="text-danger">₦{{$product->price}}</h6>    
                          <p class="text-danger">{{$product->description}}</p>

                          <form class="form" action="{{url('addcart', $product->id)}}" method="POST">
                              @csrf
                              <div class="form-group">
                                Choose quantity
                              <input name="quantity" type="number" style="width:100p x" value="1" min="1" class="form-control">
                              </div>
                              <div class="form-group">
                                <input type="submit" style="background-color:blue; opacity:0.8" class="btn btn-primary" value="Add to Cart">
                              </div>
                          </form>
                          <p class="text-danger text-bolder"><b>Available in stock:  ({{$product->quantity}})</b></p>
                        <ul class="stars">
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Reviews ({{rand(30,60) }})</span>
                      </div>
                    </div>
                    </div>
                    @endforeach
<!-- </div> -->




<!-- <div class="row grid"> -->
          @foreach($dataflashdeals as $products)
          <div class="col-lg-4 col-md-4 all dev">
          <div class="product-item">
         <img width="70" src="/productimage/{{$products->image}}" alt="">
            <div class="down-content">
               <h4>{{$products->title}}</h4>
                <h6 class="text-danger">₦{{$products->price}}</h6>    
                <p class="text-danger">{{$products->description}}</p>

                <form class="form" action="{{url('addcart', $products->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                      Choose quantity
                    <input name="quantity" type="number" style="width:100p x" value="1" min="1" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="submit" style="background-color:blue; opacity:0.8" class="btn btn-primary" value="Add to Cart">
                    </div>
                </form>
                <p class="text-danger text-bolder"><b>Available in stock:  ({{$products->quantity}})</b></p>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews ({{rand(30,60) }})</span>
            </div>
          </div>
          </div>
          @endforeach



          @foreach($datalastminute as $productss)
          <div class="col-lg-4 col-md-4 all gra">
          <div class="product-item">
         <img width="70" src="/productimage/{{$productss->image}}" alt="">
            <div class="down-content">
               <h4>{{$productss->title}}</h4>
                <h6 class="text-danger">₦{{$productss->price}}</h6>    
                <p class="text-danger">{{$productss->description}}</p>

                <form class="form" action="{{url('addcart', $productss->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                      Choose quantity
                    <input name="quantity" type="number" style="width:100p x" value="1" min="1" max="{{$productss->quantity}}" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="submit" style="background-color:blue; opacity:0.8" class="btn btn-primary" value="Add to Cart">
                    </div>
                </form>
                <p class="text-danger text-bolder"><b>Available in stock:  ({{$productss->quantity}})</b></p>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews ({{rand(30,60) }})</span>
            </div>
          </div>
          </div>
          @endforeach







              </div>
   
          </div>
        </div>
      </div>
  
      
      <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2022 Albass Clothing Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="#" target="_blank">Mohammed Ali</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


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
