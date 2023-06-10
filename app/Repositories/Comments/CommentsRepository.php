<?php

namespace App\Repositories\Comments;

use App\Models\Comments;

class CommentsRepository implements CommentsInterface
{
    public function getComments()
    {
        return Comments::with('user','admin')->where('parent_id', null)->latest()->paginate(10);
    }

    public function showComments($id)
    {
        return Comments::with('user','admin', 'childrenRecursive')->findOrFail($id);
    }

    public function storeComments($data)
    {
        Comments::create([
            'admin_id'  => $data->admin_id,
            'parent_id' => $data->parent_id,
            'text'      => $data->message,
        ]);
    }

    public function findComments($id)
    {
        return Comments::find($id);
    }

    public function updateComments($data, $id)
    {
        $comment = Comments::findOrFail($id);

        if ($comment->parent_id) {
            $idComment = $comment->parent_id;
        } else {
            $idComment = $comment->id;
        }

        $comment->update([
            'text'      => $data->message,
            'status'    => $data->status,
        ]);
        return $idComment;
    }

    public function destroyComments($id)
    {
        $comments = Comments::with('childrenRecursive')->findOrFail($id);
        if ($comments->childrenRecursive) {
            foreach ($comments->childrenRecursive as $children) {
                $children->delete();
            }
        }
        $comments->delete();
    }
}
