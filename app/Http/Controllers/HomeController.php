<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $query = User::all();

        return response()->json(['users' => $query], 200);
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
    
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $user = Auth::user();
            $token = $user->createToken('Access Token')->accessToken;
            return response()->json(['token' => $token], 200);
        } else { 
            return response()->json(['error' => 'Invalid email or password'], 401);
        } 
    }
}
