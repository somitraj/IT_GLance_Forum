<?php

namespace IT_Glance_Forum\Http\Controllers\Api;

use Dingo\Api\Exception\ValidationHttpException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use IT_Glance_Forum\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class LoginController
 * @package IT_Glance_Forum\Http\Controllers\Api
 */
class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function Login(Request $request)
    {
        $credentials = $request->only(['username', 'password']);
        $validator = Validator::make($credentials, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $user = \IT_Glance_Forum\Models\UsersTbl::where('username', '=', $request->username)->first();

        if (!$user) {
            throw new \Exception('Invalid username', ExceptionCode::INVALID_USER);
        } elseif (!Hash::check($request->password, $user->password)) {
            throw new \Exception('Invalid Password', ExceptionCode::INVALID_PASSWORD);
        }


        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->response->errorUnauthorized();
            }
        } catch (JWTException $e) {
            return $this->response->error('could_not_create_token', 500);
        }

        $user = \IT_Glance_Forum\Models\UsersTbl::where('username', '=', $request->username)
            ->where('status_id', '=', 1)
            ->first()->toArray();  //database bata data tanna
        return response()->json(compact('user', 'token'));

    }
}
