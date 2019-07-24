<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use Hash;
use App\Rules\ExistsPassword;
use App\Mail\PasswordChanged;
use Illuminate\Support\Facades\Mail;

class SettingController extends Controller
{
    public function edit()
    {
        $user_id = Auth::id();
        $user = User::where('id',$user_id)->first();
        $user_detail = UserDetail::find($user->id);

        return view('user_settings.edit',[
            'user' => $user,
            'user_detail' => $user_detail,
        ]);
    }

    public function update(Request $request)
    {
        $user_id = Auth::id();
        $user = User::where('id',$user_id)->first();
        $user_detail = UserDetail::find($user->id);

        $this->validate($request,[
            'account_name' => [
                'required',
                'regex:/^[a-zA-Z0-9]+$/',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        if(isset($request->passwordNew)){
            $this->validate($request,[
                'password' => [
                    new ExistsPassword(auth()->user())
                ],
                'passwordNew' => 'required|string|min:6|confirmed',
            ]);
        }

        $user->account_name = $request->account_name;
        if(isset($request->passwordNew)){
            $hashedPassword = $user->password;
            $password = Input::get('password');
            $user->password = Hash::make(Input::get('passwordNew'));
            $user_detail = UserDetail::find($user->id);
            $display_name = $user_detail->display_name;
            Mail::to($user->email)->send(new PasswordChanged($display_name));
        }
        $user->email = $request->email;
        $user->save();

        return redirect('/setting/edit')->with('my_status',__('ユーザー設定が変更されました。'));
    }
}
