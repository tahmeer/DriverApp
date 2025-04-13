<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function orderIndex(Request $request)
    {

        if ($request->ajax()) {
            $data = Order::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // $editUrl = url('admin/editCountry/' . $row->id);
                    $actionBtn = '';
                    // '<a href="' . $editUrl . '" class="edit btn btn-success btn-sm">Edit</a>
                    // <button type="button" class="delete btn btn-danger btn-sm deleteUserButton" onClick="DeleteModal(this)" data-countryId=' . $row->id . '>Delete</button>';
                    return $actionBtn;
                    // <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.Order.list');
    }
}
