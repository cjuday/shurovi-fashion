<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function __consturct() {
        $this->middleware('guest')->except('logout');
    }

    public function index() {
        return view('login');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'mail'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth()->attempt(array('email'=>$input['mail'], 'password'=>$input['password'])))
        {
            return redirect(route('admin.dashboard'));
        }else{
            return back()->with('error','Invalid Credentials!');
        }
    }

    public function logout(Request $request)
    {
        Auth()->logout(); 

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin')->with('success','Logged Out Successfully!');
    }
}
