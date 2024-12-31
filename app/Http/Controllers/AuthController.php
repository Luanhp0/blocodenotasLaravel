<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        
        return view('login');

    }

    public function loginSubmit(Request $request){

        // form validation 
        $request->validate(
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:12'
            ],
             // error messages
            [
                'text_username.required' => 'O username é obrigatório',
                'text_username.email' => 'O username deve ser um email válido',
                'text_password.required' => 'A senha é obrigatória',
                'text_password.min' => 'A senha deve ter no mínimo :min caracteres',
                'text_password.max' => 'A senha deve ter no máximo :max caracteres',
                
            ]

        );

        // get user input
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        // check if user exists
        $user = User::where('username',$username)->where('deleted_at',null)->first();

        if(!$user){
            return redirect()->back()->withInput()->with('loginError','Username ou password inválidos');
        }
        
        echo '<pre>';
        print_r($user);
    }    

    public function logout(){
        echo 'logout';
    }



}
