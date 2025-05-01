<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerSupport;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CustomerSupportController extends Controller
{
    public function customerSupportIndex(Request $request)
    {

        if ($request->ajax()) {
            $data = CustomerSupport::select('*')->distinct('user_id')->orderBy('id', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = url('admin/customer/support/message/?id=' . $row->user_id);
                    $actionBtn = '<a href="' . $editUrl . '" class="edit btn btn-success btn-sm">Edit</a>';
                    // <button type="button" class="delete btn btn-danger btn-sm deleteUserButton" onClick="DeleteModal(this)" data-cityId=' . $row->id . '>Delete</button>
                    return $actionBtn;
                })
                // ->editColumn('country_id', function ($row) {
                //     return $row->country_name;
                // })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.CustomerSupport.list');
    }

    public function adminsupportReply(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $validator = Validator::make($request->all(), [
                    'msg' => 'required|string',
                    'user_id' => 'required',
                    
                ]);

                if (!$validator->fails()) {

                    $customerSupport = new CustomerSupport;
                    $customerSupport->admin_id = Auth::guard('admin')->user()->id;
                    $customerSupport->user_id = $request->user_id;
                    $customerSupport->is_user = '0';
                    $customerSupport->message = $request->msg;
                    $customerSupport->save();

                    return response()->json($customerSupport, 200);
                }
            } catch (Exception $e) {
                DB::rollBack();
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        $data['user'] = User::find($request->id);

        CustomerSupport::where('user_id', $request->id)->update(['read' => 1]);
        $customerMessages = CustomerSupport::with(['users'])->where('user_id', $request->id)->get();

        // $previousMessage = null;
        // foreach ($customerMessages as $key => $message) {
        //     if ($message->is_user == 0 && $previousMessage && $previousMessage->is_user == 1) {
        //         $responseTime = $this->formatTimeDifference($previousMessage->created_at, $message->created_at);
        //         $customerMessages[$key]->response_time = $responseTime;
        //     } else {
        //         $customerMessages[$key]->response_time = null;
        //     }

        //     $previousMessage = $message;
        // }

        $data['customerallMessages'] = $customerMessages;

        return view('Admin.CustomerSupport.edit', $data);
    }
}
