<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $query = Admin::all();

        return response()->json(['admins' => $query], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email', 
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                $validator->errors()->all()
            ], 422);
        }

        $user = Admin::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                return response()->json(['token' => $token], 200);
            } else {
                return response()->json(["message" => "Password mismatch"], 422);
            }
        } else {
            return response()->json(["message" =>'User does not exist'], 422);
        }
    
        // if (Auth::attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ])) {
        //     $user = Auth::user();
        //     $token = $user->createToken('Laravel')->accessToken;
        //     return response()->json(['token' => $token], 200);
        // } else { 
        //     return response()->json(['error' => 'Unauthorised'], 401);
        // } 
    }
}
