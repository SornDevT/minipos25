<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use JWTAuth; // Ensure you have the JWTAuth package installed
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class UserController extends Controller
{
    //


    public function register(Request $request)
    {

        // Create the user
        // $user = User::create([
        //     'UserName' => $request->username,
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        // // Return a response
        // return response()->json([
        //     'message' => 'User registered successfully', 
        //     'user' => $user
        // ], 201);


        try{


            $user = User::create([
                'UserName' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $success = true;
            $message = 'ບັນທຶກຂໍ້ມູນສຳເລັດ';

        } 
        catch (\Illuminate\Database\QueryException $ex){

            $success = false;
            $message = $ex->getMessage();

        }

         return response()->json([
            'success' => $success,
            'message' => $message,
        ], 201);


    }

    public function login(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // check remember me
        if($request->remember_me){
            // Set time out for token
            JWTAuth::factory()->setTTL(60 * 24 * 7); // 7 days
        }

        // attempt
        $token = JWTAuth::attempt($credentials);
        $user = Auth::user();

        if ($token) {
            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => $user
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'ອີເມວລ໌ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ!'
            ]);
        }
    }

    public function logout()
    {
        try {
            $token = JWTAuth::getToken();
            // Invalidate the token
            JWTAuth::invalidate($token);


            return response()->json([
                'success' => true,
                'message' => 'ທ່ານໄດ້ອອກຈາກລະບົບແລ້ວ',
            ]);
        } catch (\Exception $e) {
            
            // return $e->getMessage();

            return response()->json([
                'success' => false,
                'message' => 'ການອອກລະບົບບໍ່ສຳເລັດ: ',
            ], 200);
        }
    
    }

}
