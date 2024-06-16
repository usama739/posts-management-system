<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $fields['password'] = bcrypt($fields['password']);
        $user = User::create($fields);                  /// insert into database 
        auth()->login($user);
        return redirect('/');
    }


    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    
    public function login(Request $request){
        $fields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required',
        ]);

        /// accessing username and password
        $name = $fields['loginname'];
        $password = $fields['loginpassword'];

        if(auth()->attempt(['name' => $name, 'password' => $password])){
            /// if user's authentication is true, then regenerate the session ID of user
            /// this will change the authentication state and it will decide what to display on frontend

            $request->session()->regenerate();
        }


        return redirect('/');               /// redirect to homepage ///
    }


    

}
