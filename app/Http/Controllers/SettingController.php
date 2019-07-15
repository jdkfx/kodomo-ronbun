<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserDetail;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function show()
    {
        $user_id = Auth::id();
        $user = User::where('id',$user_id)->first();
        $user_detail = UserDetail::find($user->id);

        return view('user_settings.show',[
            'user' => $user,
            'user_detail' => $user_detail,
        ]);
    }

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
        $this->validate($request,[

        ]);

        $user_id = Auth::id();
        $user = User::where('id',$user_id)->first();
        $user_detail = UserDetail::find($user->id);

        return redirect('/setting');
    }
}
