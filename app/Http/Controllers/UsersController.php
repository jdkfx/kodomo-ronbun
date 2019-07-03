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
}
