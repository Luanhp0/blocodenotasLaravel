<?php

namespace App\Http\Controllers;

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

        // test database connection 
        try{
            DB::connection()->getPdo();
            echo 'Connected successfully to: ';
        }catch(\PDOException $e){
            echo 'Connection failed: ' . $e->getMessage();
        }
        echo 'fim';
    }

    public function logout(){
        echo 'logout';
    }



}
