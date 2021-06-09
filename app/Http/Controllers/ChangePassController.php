<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ChangePassController extends Controller
{
    public function ChangePassword(){
        return view('admin.changepassword.chane_password');
    }

    // 

    public function UpdatePassword(Request $request){
        
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password is Change Sussessfuly');
        }
        else{
            return redirect()->back()->with('error', 'Current Password is Invalid');
        }

    }

    // 

    public function ProUpdate(){
      if(Auth::user()){
          $user = User::find(Auth::user()->id);
          if($user){
              return view('admin.update_profile.indax',compact('user'));
          }
      }  
    }


    // 

    public function UpdateProfie(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->save();
            return Redirect()->back()->with('success', 'User Profile Is Success');

        }else{
            return Redirect()->back();
        }
    }

    // 
  
























    // end
}
