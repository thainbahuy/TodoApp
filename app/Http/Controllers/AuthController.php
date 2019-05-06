<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials['email'] = $request->get('email');
        $credentials['password'] = $request->get('password');
        try {
            // xác nhận thông tin người dùng gửi lên có hợp lệ hay không ,neu hop le ti generate ra token roi tra ve
            $token = JWTAuth::attempt($credentials);
            if ($token) {
                return response()->json(['token' => $token], Response::HTTP_OK);
            } else {
                return response()->json(['error' => 'invalid_credentials'], Response::HTTP_BAD_REQUEST);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), Response::HTTP_BAD_REQUEST);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            // vi JWTAuth::attempt ve lay password da hash nen phai hash pass trc
            'password' => Hash::make($request->get('password')),
        ]);

        //generate ra token tu data user khi da tao ra trong db
        //$token = JWTAuth::fromUser($user);

        return response()->json(compact('user'), Response::HTTP_CREATED);
    }

    public function getAuthenticatedUser()
    {
//        try {
//            // ham nay se nhan token o hearder , sau do se generate token ra du lieu de xac thuc data user trong db
//            if (!$user = JWTAuth::parseToken()->authenticate()) {
//                return response()->json(['user_not_found'], 404);
//            }
//
//        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
//
//            return response()->json(['token_expired'], $e->getStatusCode());
//
//        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
//
//            return response()->json(['token_invalid'], $e->getStatusCode());
//
//        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
//
//            return response()->json(['token_absent'], $e->getStatusCode());
//
//        }
        // parse token sang data user
        $user = JWTAuth::parseToken()->toUser();
        //generate data ra token moi
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user', 'token'));
    }
}
