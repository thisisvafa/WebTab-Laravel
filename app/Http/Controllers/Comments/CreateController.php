<?php

namespace App\Http\Controllers\Comments;

use App\Events\CommentSubmitted;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Comments;
use App\Notifications\NewCommentNotification;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function create()
    {
        return view('comments.create');
    }

    public function store(Request $request)
    {
        $comment = Comments::create([
            'user_id'  => $request->user_id,
            'text'      => $request->message,
        ]);

        try {
            event(new CommentSubmitted($comment));
            $admin = Admin::find(1);
            $admin->notify(new NewCommentNotification($comment));
        } catch (\Exception $e) {}

        return redirect()->route('comments');
    }

    public function storeParent(Request $request)
    {
        $comment = Comments::create([
            'user_id'       => $request->user_id,
            'parent_id'     => $request->parent_id,
            'text'          => $request->message,
        ]);

        try {
            event(new CommentSubmitted($comment));
            $admin = Admin::find(1);
            $admin->notify(new NewCommentNotification($comment));
        } catch (\Exception $e) {}

        return redirect()->back();
    }
}
