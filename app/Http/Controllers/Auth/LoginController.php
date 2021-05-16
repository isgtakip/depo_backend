<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;




class LoginController extends Controller
{
    
    public function __invoke(Request $request){

        if (!auth()->attempt($request->only('email','password'))){
            throw ValidationException::withMessages([
                'email' => ['Credentials are incorrect.'],
            ]);
            
        }

   // $request->session()->regenerate();

    //return  response()-json(null,201)

    }
}