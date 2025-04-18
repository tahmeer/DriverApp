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
                'page' => 'required|integer:min:1'
            ]);
            $size = $request->size;
            $user = Auth::guard('api')->user(); // get logged-in user

            $orders = $user->orders()->paginate($size);
            return new OrderCollection($orders);
        }catch(Throwable $th){
            return response(['message' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }
}
