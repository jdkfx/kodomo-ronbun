<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserDetail;
use App\Report;

class UsersController extends Controller
{
    public function show($account_name){
        $user = User::where('account_name',$account_name)->first();
        $user_detail = UserDetail::find($user->id);
        $reports = Report::where('user_id',$user->id)->orderBy('created_at', 'desc')->get();

        return view('users.show',[
            'user' => $user,
            'user_detail' => $user_detail,
            'reports' => $reports,
        ]);
    }

    public function edit($account_name){
        $user = User::where('account_name',$account_name)->first();
        $user_detail = UserDetail::find($user->id);

        return view('users.edit',[
            'user' => $user,
            'user_detail' => $user_detail,
        ]);
    }

    public function update(Request $request,$account_name){
        $this->validate($request,[
            'display_name' => 'required',
            'profile_image' => 'required|image',
            // 'prifile_text' =>'required',
        ]);

        $user = User::where('account_name',$account_name)->first();
        $user_detail = UserDetail::find($user->id);

        $path = $request->profile_image->store('public/profile_image');
        $user_detail->profile_image = $path;
        $user_detail->display_name = $request->display_name;
        $user_detail->profile_text = $request->profile_text;
        $user_detail->status = $request->status;
        $user_detail->save();

        return redirect('/'.$user->account_name);
    }
}
