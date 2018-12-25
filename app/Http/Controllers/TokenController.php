<?php

namespace Jiri\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Jiri\User;

class TokenController extends Controller
{
    public function checkToken($token){
        $tokenParts = explode('$',$token);
        $jiri_id = $tokenParts[count($tokenParts)-1];

        $user = User::whereToken($token)->first();
        Auth::login($user,true);
        session(['jiri_id' => $jiri_id]);

        return Redirect::action('JiriController@show', $jiri_id);

    }
}
