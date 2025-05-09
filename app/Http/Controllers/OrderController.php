<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderCollection;
use App\Models\Order;
use App\Models\OrderUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
