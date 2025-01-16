<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\LoginMemberRequest;
use App\Http\Requests\RegisterMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    public function showRegister()
    {
        return view('frontend.register');
    }

    public function register(RegisterMemberRequest $request)
    {
        $data = $request->all();
        $data['level'] = 0; 

        $file = $request->image;
        // dd($file);

        if (!empty($file)) {
            $data['image'] = $file->getClientOriginalName();
        }       
        // dd($data);
        if (User::create($data)) {
            if (!empty($file)) {
                $file->move('uploads', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Register success.'));
        }else{
            return redirect()->back()->withErrors('Register error.');
        }
    }

    public function showLogin()
    {
        return view('frontend.login');
    }   

    public function login(LoginMemberRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0,
        ];
        // dd($login);
        $remember = false;

        if ($request->remember_me) {
            $remember = true;
        }

        if (Auth::attempt($login, $remember)) {
            return redirect('/index');
        }else{
            return redirect()->back()->withErrors('Email or password is not correct.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/member/login');
    }

    public function account()
    {
        $user = Auth::user();
        return view('frontend.account', compact('user'));
    }

    public function update(UpdateMemberRequest $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $data = $request->all();
        $file = $request->avatar;

        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
        }
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = $user->password;
        }
        if ($user->update($data)) {
            if (!empty($file)) {
                $file->move('uploads/user/avatar', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Update profile success.'));
        }else{
            return redirect()->back()->withErrors('Update profile error.');
        }
    }
    
}
