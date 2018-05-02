<?php

namespace App\Http\Controllers\front;

use App\Mail\DoneRegister;
use App\School;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*public function register()
    {
        $schools=School::all('name_'.app()->getLocale(),'id');
        if(Auth::guard('users')->check()){
            return redirect()->to(loadAsset('/'));
        }
        return view('website.user.register',compact('schools'));
    }
    public function doRegister(Request $request)
    {
        $this->validate($request,[
            //'img'               =>'required',
            'name'                  =>'required',
            'school'            =>'required',
            'type'             =>'required',
            'email'                 =>'required|email|unique:users',
            'password'          => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'terms'             =>'required',
        ]);
        $request->merge(['active'=>0]);
        $request->merge(['school_id'=>$request->school]);
        if($request->has('terms')){
            $request->merge(['terms'=>1]);
        }
        if($request->has('newsletter')){
            $request->merge(['newsletter'=>1]);
        }
        if($request->hasFile('img')){
            $request->merge(['image'=>$request->file('img')->store('users/images')]);
        }else{
            $request->merge(['image'=>'users/user.png']);
        }
        if($request->has('password')){
            $request->merge(['password'=>bcrypt($request->password)]);
        }

        $user=User::create($request->all());

        Mail::to($user->email)->send(new DoneRegister($user->name),['userName'=>$user->neme]);
        Auth::login($user);
        return redirect('/');
    }



    public function login()
    {
        if(Auth::guard('users')->check()){
            return redirect()->to('/');
        }
        return view('website.user.login');
    }



    public function doLogin(Request $request)
    {
       $this->validate($request,[
           'email'=>'required|email',
           'password'=>"required",
       ]);
        $credentials = $request->only(['email','password']);
        $attempt     = Auth::guard('users')->attempt($credentials,$request->remember);
        if($attempt){
            if(session()->has('redirectUriUserLogin'))
                return redirect()->to(url(session()->get("redirectUriAdminLogin")));

            return redirect()->route('profile',['lang'=>app()->getLocale()]);
        }
        //return Auth::user();

        return redirect()->back()->with(['error'=>'wrong email or password']);

    }

    public function logout()
    {
        Auth::guard('users')->logout();
        return redirect()->to('/');
    }*/
}
