<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Report;

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

        // ろんぶんを投稿した人物以外のユーザーがコメントしたらvar_dump()
        $report = Report::where('id', $request->report_id)->first();
        if(\Auth::id() != $report->user->id){
            var_dump($request);
            exit;
        }

        return redirect()->back();
    }
}
