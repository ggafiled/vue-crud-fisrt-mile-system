<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Comment;
use App\Mailers\AppMailer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function postComment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);
        $comment = Comment::create([
            'ticket_id' => $request->input('ticket_id'),
            'user_id' => Auth::user()->id,
            'comment' => $request->input('comment')
        ]);

        return redirect()->back()->with("status", "Your comment has be submitted.");
    }
}