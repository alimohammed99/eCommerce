<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\User;

use App\Models\Products;

use App\Models\Cart;

use App\Models\Order;

class HomeController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype; 
           // THIS MEANS WHEN SOMEBODY TRIES TO LOGIN, IT WILL/SHOULD GET THE USER TYPE FIRST(IS IT AN ADMIN OR AN ORDINARY USER).

           if($usertype == '1'){
              return view('admin.home');
           }else{
            $data = products::paginate(3);

            $user = auth()->user();
                //  WE HAVE THIS HERE BECAUSE WE WANT TO GET THE ID OF THE USER CURRENTLY LOGGED IN BEFORE WE CAN KNOW WHOSE CART TO DISPLAY TO THE HOMEPAGE.
            $count = cart::where('phone', $user->phone)->count();

                //  HERE, WE WANT TO COUNT THE CART ITEMS OF THE CURRENT USER. SO WE USED 'PHONE NUMBER' IN THE 'DB' COZ SOME USERS MIGHT HAVE SIMILAR OR SAME NAME BUT TWO USERS CANNOT HAVE THE SAME PHONE NUMBER. SO WE ARE COUNTING HOW MANY TIMES THIS PHONE NUMBER APPEARS IN THE CART TABLE.
                // SO AFTER COUNTING, WE ARE STORING IT IN A VARIABLE '$count'.


            return view('user.home', compact('data', 'count'));
                //   WE ADDED 'count' COZ WE ARE NOT ONLY SHOWING THE 'data' i.e THE PRODUCT PAGINATION BUT ALSO THE 'count' i.e,  THE CART COUNT;
           }
 
        
    }


    public function index(){
        if(Auth::id()){
            return redirect('redirect');
        }else{
            $data = products::paginate(3);
            return view('user.home', compact('data'));
        }
         
    }



    public function aboutus(){

        if(Auth::id()){
            $user = auth()->user();
            $count = cart::where('phone', $user->phone)->count();
            return view('user.about', compact('count'));
           
        }else{
            return view('user.about');
        }
         
    }

    public function contactus(){

        if(Auth::id()){
            $user = auth()->user();
            $count = cart::where('phone', $user->phone)->count();
            return view('user.contactus', compact('count'));
           
        }else{
            return view('user.contactus');
        }
         
    }

     public function ourproducts(){

        if(Auth::id()){
            $data = products::all();
            $datafeatured = products::where('type', 'featured')->get();
            $dataflashdeals = products::where('type', 'flashdeals')->get();
            $datalastminute = products::where('type', 'lastminute')->get();
            $user = auth()->user();
            $count = cart::where('phone', $user->phone)->count();
            return view('user.ourproducts', compact('count', 'data', 'datafeatured', 'dataflashdeals', 'datalastminute'));
           
        }else{
            $data = products::all();
            $datafeatured = products::where('type', 'featured')->get();
            $dataflashdeals = products::where('type', 'flashdeals')->get();
            $datalastminute = products::where('type', 'lastminute')->get();
            return view('user.ourproducts', compact('data', 'datafeatured', 'dataflashdeals', 'datalastminute'));
        }
         
    }



    public function searchproduct(Request $request){


        if(Auth::id()){
             $search = $request->search;
                // search is the name of the input

                if($search == ''){
                    $data = products::paginate(3);
                    return view('user.home', compact('data'));
                }

                $data = products::where('title', 'Like', '%' . $search . '%')->get();

                $user = auth()->user();

                $count = cart::where('phone', $user->phone)->count();

                return view('user.home', compact('data', 'count'));
        }else{
            
            $search = $request->search;
            // search is the name of the input

                if($search == ''){
                    $data = products::paginate(3);
                    return view('user.home', compact('data'));
                }
                $data = products::where('title', 'Like', '%' . $search . '%')->get();

                return view('user.home', compact('data'));
        }
    }


    public function addcart(Request $request, $id){

        if(Auth::id())
        {
            $user = auth()->user();
                //   THIS IS TO GET THE ID OF THE SPECIFIC USER THAT IS LOGGED IN. WE HAVE TO KNOW WHO EXACTLY IS LOGGED IN, IN ORDER TO ADD ITEMS TO CART FOR HIM/HER. SO WE SAVED THAT INFO INTO THE VARIABLE "$user";

                $product = products::find($id);
                    // WHAT WE ARE DOING HERE IS, WE ARE GETTING THE SPECIFIC PRODUCT THE USER CLICKS BY FINDING ITS ID, AND WE ARE STORING IT IN A VARIABLE "$product".

                $cart = new Cart;

                $cart->name = $user->name;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->product_title = $product->title;
                $cart->price = $product->price;

                $cart->quantity = $request->quantity;
                    //  WE USED $request HERE BECAUSE IT IS AN INPUT FIELD WHICH THE USER MUST FILL. AND BEFORE YOU FILL AND SEND ANYTHING TO THE DB, YOU HAVE TO MAKE A REQUEST.

                $cart->save();

                return redirect()->back()->with('message', 'Product has been added to cart');
        }
        else
        {
            return redirect('login');
        }

    }


 
  public function showcart()
  {

    $user = auth()->user();
                //  WE HAVE THIS HERE BECAUSE WE WANT TO GET THE ID OF THE USER CURRENTLY LOGGED IN BEFORE WE CAN KNOW WHOSE CART TO DISPLAY TO THE HOMEPAGE.


                $cart = cart::where('phone', $user->phone)->get();
                    // HERE, WE WANT TO DISPLAY THE ITEMS THAT THE CURRENT USER ADDED TO THE CART. WE USED PHONE NUMBER COZ IT'S UNIQUE. SO NOW, IT WILL SHOW ONLY THE USER'S PHONE NUMBER THAT APPEAR IN THE CART TABLE. SO WE ARE COMPARING THE 'phone' IN THE DB WITH THE PHONE OF THE CURRENT USER.


            $count = cart::where('phone', $user->phone)->count();

                //  HERE, WE WANT TO COUNT THE CART ITEMS OF THE CURRENT USER. SO WE USED 'PHONE NUMBER' IN THE 'DB' COZ SOME USERS MIGHT HAVE SIMILAR OR SAME NAME BUT TWO USERS CANNOT HAVE THE SAME PHONE NUMBER. SO WE ARE COUNTING HOW MANY TIMES THIS PHONE NUMBER APPEARS IN THE CART TABLE.
                // SO AFTER COUNTING, WE ARE STORING IT IN A VARIABLE '$count'.



      return view('user.showcart', compact('count','cart'));
  }  


  public function deletecart($id){
      $data = cart::find($id);
      $data->delete();

      return redirect()->back()->with('message', 'Product deleted successfully');



  }



  public function confirmorder(Request $request){

      $user = auth()->user();
      $name = $user->name;
      $phone = $user->phone;
      $address = $user->address;

      foreach($request->productname as $key => $productname){

        $order = new order;
        
        $order->product_name = $request->productname[$key];
        $order->price = $request->price[$key];
        $order->quantity = $request->quantity[$key];

        $order->name = $name;
        $order->phone = $phone;
        $order->address = $address;

        $order->status = 'Not delivered';

        $order->save();

      }


       DB::table('carts')->where('phone', $phone)->delete();

      return redirect()->back()->with('message', 'Product Ordered successfully');;
  }



 

}
 