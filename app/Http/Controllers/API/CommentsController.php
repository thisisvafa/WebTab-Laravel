<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentsResource;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function show($id)
    {
        $comments = Comments::with('user','admin', 'childrenRecursive')->findOrFail($id);
        return new CommentsResource($comments);
    }
}
