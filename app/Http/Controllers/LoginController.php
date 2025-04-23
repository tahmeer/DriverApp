<?php

namespace App\Http\Controllers;

use App\Models\CustomerSupport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // public function createPhoneOtpV2(Request $request, $again = false)
    // {
    //     try {
            
    //             $validator = Validator::make($request->all(), [
                    
    //             ], [
                    
    //             ]);
            

    //         if ($validator->fails()) {
                
    //         }

    //         $phone = $request->phone;
    //         $ip = $request->ip();

    //         $attempts = PhoneVerification::select('phone', 'ip')
    //             ->selectRaw('COUNT(*) as attempt_count')
    //             ->where(function ($query) use ($phone, $ip) {
    //                 $query->where('phone', $phone)
    //                     ->orWhere('ip', $ip);
    //             })
    //             ->where('updated_at', '>=', now()->subHour())
    //             ->groupBy('phone', 'ip')
    //             ->havingRaw('COUNT(*) >= ?', [3])
    //             ->get();

    //         // Check if there are any matching attempts
    //         if ($attempts->isNotEmpty()) {
    //             return apiResponse('Failure', ['phone' => ['Too many attempts. This number is temporarily blocked.']], 422);
    //         }

    //         $otp = PhoneVerification::generateCode();

    //         $data = [
    //             'phone' => $request->phone,
    //             'otp' => $otp,
    //             'unique_id' => NULL,
    //             'is_used' => '0',
    //             'ip' => $request->header('cf-connecting-ip'),
    //         ];

    //         if ($request->phone == '+966000000096' || $request->phone == '+923367182717' || $request->phone == '+966000000098' || $request->phone == '+966000000889' || $request->phone == '+966000000786' || $request->phone == '+966920023564') {
    //             $data['otp'] = 8686;

    //             PhoneVerification::create($data);

    //             return apiResponse(null, 'Success', 200);
    //         }

    //         $createdOtp = PhoneVerification::create($data);
    //         $createdOtp->formatted_phone = $createdOtp->phone;
    //         $sendOtpResponse = $this->helper->sendOtp($createdOtp->phone, $otp);

    //         if (!$sendOtpResponse) {
    //             return apiResponse(null, 'Invalid Mobile Number', 400);
    //         }
    //         //            $createdOtp->notify(
    //         //                new UserNotify(
    //         //                    'system.send.opt.user',
    //         //                    route('home'),
    //         //                    [':code' => $code]
    //         //                )
    //         //            );

    //         return apiResponse(null, 'Success', 200);
    //     } catch (\Throwable $th) {
    //         if ($th->getCode() == 483) {
    //             return apiResponse('Failure', ['phone' => ['Unable to send message try another login method.']], 422);
    //         }
    //         return apiResponse('Failure', $th->getMessage(), 500);
    //     }
    // }

    public function login(Request $request)
    {
        try {
            
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:200',
                'password' => 'required',
            ]);


            if ($validator->fails()) {
                return response()->json(['message' => 'failure', 'error' => $validator->errors()], 422);
            } else {

                $users = User::where('email', $request->email)->first();

                if (!empty($users)) {
                    if ($users->status != 'Inactive') {
                        
                        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                            
                            $tokenResult = $users->createToken('API Token');
                            $accessToken = $tokenResult->accessToken;
                            $data = [
                                'user' => $users,
                                'token' => $accessToken
                            ];
                            return response()->json(['message' => 'Success', 'data' => $data], 200);
                           
                        } else {
                        return response()->json(['message' => 'failure', 'error' => 'Invalid Credentials'], 422);
                           
                        }
                    } else {
                       
                        return response()->json(['message' => 'failure', "error" => "User is inactive. Please try again!"], 422);
                        
                    }
                } else {
                    
                    return response()->json(['message' => 'failure', "error" => "There isn't an account associated with this email address."], 500);
                    
                }
            }
        } catch (\Throwable $th) {
            return response(['message' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }


    public function getDetails(Request $request){
        return "success";
    }

    public function storeCustomerSupport(Request $request){
        try{
            $customerSupport = new CustomerSupport();
            $customerSupport->user_id = Auth::id();
            $customerSupport->is_user = 1;
            $customerSupport->message = $request->message;
            $customerSupport->read = '0';
            $customerSupport->save();

            return response()->json(['message' => 'Success', 'data' => $customerSupport], 200);

        }catch (\Throwable $th) {
            return response(['message' => 'failure', 'error' => $th->getMessage()], 500);
        }
        
    }
}
