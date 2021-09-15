<?php

namespace App\Http\Controllers\rest_api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function __invoke(Request $request)
    {
        return response($request->user()->name);
    }
}
