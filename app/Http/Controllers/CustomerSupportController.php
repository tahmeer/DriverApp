<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerSupportCollection;
use App\Models\CustomerSupport;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerSupportController extends Controller
{
    public function adminsupportReply(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $validator = Validator::make($request->all(), [
                    'msg' => 'required|string',
                    
                ]);

                if (!$validator->fails()) {

                    $customerSupport = new CustomerSupport;
                    $customerSupport->user_id = Auth::user()->id;
                    $customerSupport->is_user = 0;
                    $customerSupport->message = $request->msg;
                    $customerSupport->save();

                    return response()->json($customerSupport, 200);
                }
            } catch (Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        $request->validate([
            'size' => 'required|integer|min:1,max:10000',
            'page' => 'required|integer:min:1'
        ]);
        $size = $request->size;
        CustomerSupport::where('user_id', Auth::user()->id)->update(['read' => 1]);
        $userMessages = CustomerSupport::with(['users'])->where('user_id', Auth::user()->id)->orderBy('id', 'desc')
            ->paginate($size);
        return new CustomerSupportCollection($userMessages);
    }

}
