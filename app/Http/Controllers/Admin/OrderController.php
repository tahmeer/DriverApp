<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderUser;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function orderIndex(Request $request)
    {
        $users = User::where('status','Active')->where('visibility',1)->get();

        if ($request->ajax()) {
            $data = Order::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // $editUrl = url('admin/editCountry/' . $row->id);
                    $actionBtn = '<button type="button" class="delete btn btn-success btn-sm deleteUserButton" onClick="AssignModal(this)" data-orderId=' . $row->id . '>Action</button>';
                    if($row->status == "Ongoing"){
                        return 'Assigned';
                    }else{
                        return $actionBtn;
                    }
                    // <a href="#" class="edit btn btn-success btn-sm">Edit</a>
                    // <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.Order.list',compact('users'));
    }

    public function assignOrder(Request $request){

        $order = Order::find($request->order_id);

        if($order){
            $orderAssign = new OrderUser();
            $orderAssign->user_id = $request->assign_to;
            $orderAssign->order_id = $order->id;
            $orderAssign->save();

            $order->status = "Ongoing";
            $order->save();
        }
        

        
        return redirect()->route('orderList');
    }
}
