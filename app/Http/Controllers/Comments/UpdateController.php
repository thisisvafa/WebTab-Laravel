<?php

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function edit($id)
    {
        $comment = Comments::find($id);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $comment = Comments::findOrFail($id);

        if ($comment->parent_id) {
            $idComment = $comment->parent_id;
        } else {
            $idComment = $comment->id;
        }

        $comment->update([
            'text'      => $request->message,
            'status'    => $request->status,
        ]);

        return redirect()->route('commentsShow', $idComment);
    }
}
