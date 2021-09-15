<?php

namespace App\Http\Controllers\rest_api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        try {
            $token = auth()->attempt($request->only('email', 'password'));
        } catch (Exception $e) {
            return response($e->getMessage(), 401);
        }
        return response()->json([
            'token' => $token,
        ]);
    }
}
