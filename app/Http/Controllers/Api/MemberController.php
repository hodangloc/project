<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Api\MemberRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\api\UpdateProfileRequest;

class MemberController extends Controller
{
    public $successStatus = 200;

    public function register(MemberRequest $request)
    {
        $user = User::All()->toArray();
        $data = $request->all();
        $file = $request->get('avatar');
        if($file) {
           $image = $file;
           $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
           $data['avatar'] = $name;
        }
        
        $data['password'] = bcrypt($data['password']);
        if ($getUser = User::create($data)) {
            if($file){
                Image::make($file)->save(public_path('upload/user/avatar/').$data['avatar']);
            }
            return response()->json([
                'message' => 'success',
                $getUser
            ], JsonResponse::HTTP_OK);
        } else {
            return response()->json(['errors' => 'error sever'], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function login(LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0,
        ];
        $remember = false;
        if ($request->remember_me) {
            $remember = true;
        }

        if ($this->doLogin($login, $remember)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'Auth' => Auth::user()
                ],
                $this->successStatus
            );
        }else{
            return response()->json([
                'response' =>'error',
                'errors' => ['errors' => 'invalid email or password'],
                ],
                $this->successStatus
            );
        }
    }

    protected function doLogin($attempt, $remember)
    {
        if (Auth::attempt($attempt, $remember)) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function update(UpdateProfileRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $getEmail = User::All()
            ->where('email', $data['email'])
            ->where('id', '<>', $id)
            ->first();
        
        if($getEmail) {
            $getEmail->toArray();
            return response()->json([
                'errors' => ['errors' => 'Email da ton tai'],
                'email' => $getEmail['email']
            ], JsonResponse::HTTP_OK);
        }
        
        $file = $request->avatar;
        if($file) {
           $image = $file;
           if(strpos($image, ';')){
                $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                $data['avatar'] = $name;
           }
        } else {
            $data['avatar'] = $user->avatar;
        }
        
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = $user->password;
        }

        if ($getUser = $user->update($data)) {
            if(strpos($file, ';')){
                Image::make($file)->save(public_path('upload/user/avatar/').$data['avatar']);
            }
            $userAuth = Auth::user();
            
            $data['id'] = $id;
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                    'response' => 'success',
                    'token' => $token,
                    'Auth' => $data
                ],
                $this->successStatus
            );
        } else {
            return response()->json([
                'errors' => 'error update',
            ],
            $this->successStatus); 
            // return response()->json(['errors' => 'error sever'], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

    }
}
