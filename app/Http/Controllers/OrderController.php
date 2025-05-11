<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderCollection;
use App\Models\Order;
use App\Models\OrderUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Throwable;

class OrderController extends Controller
{
    public function orderList(Request $request){
        try{
            $request->validate([
                'size' => 'required|integer|min:1,max:10000',
                'page' => 'required|integer:min:1',
                'type' => 'required|string|in:Pending,Ongoing,Delivered,Deteriorations,All'
            ]);
            $size = $request->size;
            $user = Auth::guard('api')->user(); // get logged-in user

            if($request->type == 'All'){
                $orders = $user->orders()->where('status', "Ongoing")->orWhere('status', "Delivered")->orderBy('created_at', 'desc')->paginate($size);
            }else{
                $orders = $user->orders()->where('status', $request->type)->orderBy('created_at', 'desc')->paginate($size);
            }
            return new OrderCollection($orders);
        }catch(Throwable $th){
            return response(['message' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function paymentPage(Request $request){
        if ($request->isMethod('post')) {
            // dd($request->all());
            $rules  = [
                'pickup_location' => 'required|string',
                'drop_location' => 'required|string',
                'delivery_type' => 'required|in:Cargo,Food',
                'price' => 'required|numeric',
                'note' => 'required|string',
                'phone_number' => 'required|string',
            ];

            if($request->delivery_type == "Cargo"){
                $rules['weight'] = 'required|numeric'; 

            }
            $request->validate($rules);
    
            $order = new Order();
            $order->pickup_location = $request->pickup_location;
            $order->drop_location = $request->drop_location;
            $order->delivery_type = $request->delivery_type;
            $order->weight = $request->delivery_type == "Cargo" ? $order->weight : null;
            $order->price = $request->price;
            $order->note = $request->note;
            $order->phone_number = $request->phone_number;
            $order->status = "Pending";
            $order->payment_status = "COD";
            $order->save();

            return "Order Placed";
    
        }
        return view('website.payment');
    }
}
