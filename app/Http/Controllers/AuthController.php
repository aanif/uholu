<?php

namespace App\Http\Controllers;

use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * @OA\Post(
     *     path="/api/auth/login",
     *     tags={"auth"},
     * @OA\Parameter(
     *     name="email",
     *     in="query",
     *     description="email of user",
     * ),
      * @OA\Parameter(
     *     name="password",
     *     in="query",
     *     description="password of user",
     * ),
     *     @OA\Response(response="200", description="Login to account"),
     * )
     */
    public function login(Request $request)
    {
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $request->email, 'password' => $request->password];
        } else {
            $credentials = ['username' => $request->email, 'password' => $request->password];
        }

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid Credentials'], 400);
            }
            auth()->attempt($credentials);
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        try {
            // todo: WIP, find user by token
//            (new AweberService())->subscribe($request->email, ['login', 'registered'], [
//                'role' => $request->user_type,
//                'username' => $request->name,
//            ]);
        } catch (ClientException $e) {
            return response()->json(
                [
                    'error' => $e->getMessage(),
                    'type' => 'aweber',
                ],
                422
            );
        }

        return response()->json(
            [
                'message' => 'success',
                'access_token' => $token
            ]
        );
    }

    public function register(Request $request)
    {
        $this->validate(
            $request->all(),
            [
                'name' => ['required', 'numeric'],
                'email' => ['required'],
                'password' => ['required'],
                'last_name' => ['required'],
                'date_of_birth' => ['required'],

            ]
        );
        $value = session()->get('type_pre');
        \Stripe\Stripe::setApiKey(config('app.stripe.secret'));
        $cust= \Stripe\Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                ]);

        if (!isset($cust->id)) {
            return response()->json(
                [
                    'status' => 'error',
                    'errors' => $cust->getMessage()
                ],
                422
            );
        }

        $user = User::registerNewUser([
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name,
            'last_name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'stripe_id' => $cust->id,
            'role' => $value,
        ]);

        return response()->json(
            [
                'status' => 'success',
                'access_token' => JWTAuth::fromUser($user)
            ],
            200
        );
    }
/**
     * @OA\Get(
     *     path="/api/auth/logout",
     *     tags={"auth"},
     *     @OA\Response(response="200", description="Logout of account"),
     * security={
     *         {"query_token": {}}
     *     }
     * )
     */
    public function logout()
    {
        $this->guard()->logout();
        return response()->json(
            [
                'status' => 'success',
                'msg' => 'Logged out Successfully.'
            ],
            200
        );
    }

    private function guard()
    {
        return auth()->guard();
    }
}
