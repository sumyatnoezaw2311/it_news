<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(){
        return view("profile/profile-edit");
    }

    public function changePhoto(Request $request){

        $request->validate([
            'photo' => 'required|mimes:jpg,png,jpeg',
        ]);
        $dir = 'public/profile/';
        Storage::delete($dir.Auth::user()->photo);
        $imageName = uniqid()."_profile." .$request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->storeAs($dir,$imageName);

        $user = User::find(Auth::user()->id);
        $user->photo = $imageName;
        $user->update();

        return redirect()->route('profile.edit');
    }

    public function change(){
        return view('profile.change-password');
    }
    public function changePassword(Request $request){

        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'new_password' => ['required','min:8'],
            'confirm_password' => ['required','same:new_password'],
            'check' =>['required'],
        ]);
        $user = User::find(auth()->user()->id);
        $user->update(['password' => Hash::make($request->new_password)]);
        Auth::logout();
        return redirect()->route("login");
    }

}
