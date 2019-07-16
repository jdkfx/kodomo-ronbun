<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserDetail;
use App\Report;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function show($account_name){
        $user = User::where('account_name',$account_name)->first();
        if($user == null){
            abort(404,'お探しのページは削除されたか、現在アクセスできない状態になっている可能性があります。<br>もしくは、アクセスしているリンクが間違っていないかお確かめください。');
        }
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
        if($user == null){
            abort(404,'お探しのページは削除されたか、現在アクセスできない状態になっている可能性があります。<br>もしくは、アクセスしているリンクが間違っていないかお確かめください。');
        }
        $user_detail = UserDetail::find($user->id);
        if(Auth::id() != $user_detail->user_id){
            return redirect('/');
        }

        return view('users.edit',[
            'user' => $user,
            'user_detail' => $user_detail,
        ]);
    }

    public function update(Request $request,$account_name){
        $this->validate($request,[
            'display_name' => 'required',
            'profile_image' => 'required|image',
            'profile_text' =>'required',
        ]);

        $user = User::where('account_name',$account_name)->first();
        $user_detail = UserDetail::find($user->id);

        $reqProImg = $request->file('profile_image');
        $path = Storage::disk('s3')->put('/profile_image', $reqProImg, 'public');
        $user_detail->profile_image = $path;
        $user_detail->display_name = $request->display_name;
        $user_detail->profile_text = $request->profile_text;
        $user_detail->status = $request->status;
        $user_detail->save();

        return redirect('/'.$user->account_name);
    }

    // TODO: 退会機能を実装する
    // public function destroy($account_name)
    // {
    //     $user = User::where('account_name',$account_name)->first();
    //
    //     $user->delete();
    //
    //     return redirect('/');
    // }
}
