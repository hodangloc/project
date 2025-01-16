<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\UpdateProfileRequest;



class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {  
        $country = DB::table('country')->get()->toArray();
        $user = Auth::user();
        return view('admin.user.profile', compact('user', 'country'));

    }


   
    public function edit()
    {
        $country = country::all();
        return view('admin.user.profile', compact('country'));
    }

    
    public function update(UpdateProfileRequest $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $id_country = $request->country;

        $data = $request->all();
        $data['id_country'] = $id_country;
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

