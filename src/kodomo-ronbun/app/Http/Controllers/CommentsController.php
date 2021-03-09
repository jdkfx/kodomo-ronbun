<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Report;
use App\Mail\ReceivingComment;
use Illuminate\Support\Facades\Mail;

class CommentsController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request,[
            'message' => 'required|max:191',
        ]);

        Comment::create([
            'user_id' => $request->user()->id,
            'report_id' => $request->report_id,
            'message' => $request->message,
        ]);

        // ろんぶんを投稿した人物以外のユーザーがコメントしたらメール送信
        $report = Report::where('id', $request->report_id)->first();
        if(\Auth::id() != $report->user->id){
            Mail::to($report->user->email)->send(new ReceivingComment($report->user->user_detail->display_name));
        }

        return redirect()->back();
    }
}
