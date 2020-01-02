<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

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

        return redirect()->back();
    }
}
