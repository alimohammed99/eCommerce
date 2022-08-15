<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Products;

use App\Models\Order;

class AdminController extends Controller
{
    public function product(){
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1'){
                  return view('admin.product'); 
            }else
            {
                 return redirect()->back();
            }
        }
    else
    {
        return redirect('login');
    }
    }
    

    public function uploadproduct(Request $request){

        $data = new products;

        $image = $request->file;

        $imagename = time(). '.' .$image->getClientOriginalExtension();
        $request->file->move('productimage', $imagename);

        $data->image = $imagename;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description; 
        $data->quantity = $request->quantity;
        $data->type = $request->type;

        $data->save();

        return redirect()->back()->with('message', 'Product added successfully');
    }

    

    public function viewproduct(){
        $data = products::all();
        return view('admin.viewproduct', compact('data'));
    }

    public function deleteproduct($id){
        $data = products::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');
    }


    public function editproduct($id){
        $data = products::find($id);
        return view('admin.editproduct', compact('data'));
    }


    public function updateproduct(Request $request, $id){
        $data = products::find($id);

        $image = $request->file;


        if($image){

       

        $imagename = time(). '.' .$image->getClientOriginalExtension();
        $request->file->move('productimage', $imagename);

        $data->image = $imagename;

        }

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->quantity = $request->quantity;

        $data->save();

        return redirect()->back()->with('message', 'Product Updated successfully'); 
    }



    public function showorders(){
        $order = order::all();
        return view('admin.showorders', compact('order'));
    }


    public function approveorderstatus($id){
        $order = order::find($id);

        $order->status="Delivered";

        $order->save();

        return redirect()->back()->with('message', 'Order has been approved'); ;
    }



    public function unapproveorderstatus($id){
        $order = order::find($id);

        $order->status="Not delivered";

        $order->save();

        return redirect()->back()->with('message', 'Order has been disapproved'); ;
    }



}
