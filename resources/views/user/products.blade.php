






<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="{{'/ourproducts'}}">view all products <i class="fa fa-angle-right"></i></a>


          <form class="form-inline" action="{{url('searchproduct')}}" method="get" style="float:right; padding-top:15px">
            <div class="form-group">
            <input type="search" style="" class="form-control mr-2" placeholder="Search Products" name="search">
            </div>

            <div class="form-group">
            <input type="submit" value="Search" style="background-color:green" class="btn btn-success">
            </div>
          </form>

            </div>
          </div>

 
           @foreach($data as $product)


          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img width="70" src="/productimage/{{$product->image}}" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>{{$product->title}}</h4></a>
                <h6>₦{{$product->price}}</h6>    
                <p>{{$product->description}}</p>


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


              </div>
            </div>
          </div>

         @endforeach 
         
 
           @if(method_exists($data, 'links'))

             <div class="d-flex">
               {!! $data->links() !!}
             </div>

            @endif


        </div>
      </div>
    </div>