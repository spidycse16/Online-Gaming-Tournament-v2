<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.welcome');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function registerControl(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|string',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|min:8|'
        ]);

        if ($validator->fails()) {
            //echo "fail";
            return back()->withErrors($validator)->withInput();
        } else {
            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
    
            $user->save();
        }
        
        return redirect()->intended('/login')->with('success','Registration Successful');
    }
    public function loginControl(Request $request)
    {
        $credentials=$request->validate([
            'email'=>['email','required'],
            'password'=>'required'
        ]);
        $email=$request->email;
        if($email=="sagor@gmail.com" && Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('adminHome');
        }
        elseif(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('/home')->with('success','You logged in successfully');
        }
        else
        {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->intended('first-page');
    }

    public function adminHome()
    {
        return view('admin.home');
    }

    public function manage(Request $request)
    {
       $title=$request->title;
       $results=Tournament::where('tournament_name','Like','%'.$title.'%')->get(['id','tournament_name']);
       //return $results;
       return view('admin.manage',compact('results'));
    }
}
