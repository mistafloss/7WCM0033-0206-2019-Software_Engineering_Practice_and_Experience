<?php

namespace Modules\Authentication\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use Validator;
use Illuminate\Http\Request;
use Auth;

class AuthenticationController extends BaseController
{
    public function login (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);
        
        if($validator->fails()){
            return redirect()->route('backofficeIndex')->withErrors($validator);
        }

        if(Auth::attempt(['username' => $request->get('username'),'password' => $request->get('password'), 'status' => 1]))
        {
            if(Auth::user()->hasRole('Developer', 'Primary Admin','Manager','Staff')){
                return redirect()->route('backofficeDashboard');
            }else{
                return redirect()->route('backofficeIndex')->withFail('Login Failed. Access denied!');
            }
        }
        else
        {
            return redirect()->route('backofficeIndex')->withFail('Login Failed. Invalid credentials!');
        }
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('backofficeIndex');
    }
}
