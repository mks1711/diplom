<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth_request;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function auth_post(auth_request $request){
        if(Auth::attempt($request->validated())){
            $request->session()->regenerate();
            return redirect()->route('/');
        }
        return back();
    }
    public function registr_post(RegistrationRequest $request)
    {
        $requests=$request->validated();
        $requests['password']=Hash::make($requests['password']);
        User::create($requests);
        $requests['position'] = $request->input('position');
        return redirect()->route('list_user');
    }
    public function showForm()
    {
        $positions = [
            'Менеджер',
            'Директор',
            'Замерщик',
            'Мастер',
            'Админ',
        ];
        return view('Admins.create_user', compact('positions'));
    }
    public function delete_user(User $user)
    {
        $user->delete();
        return back();
    }
    public function UserView(){
        $users = User::all();
        return view('Admins.list_user', compact('users'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('/');
    }
}
