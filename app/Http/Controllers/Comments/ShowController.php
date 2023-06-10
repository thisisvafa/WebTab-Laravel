<?php

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function index()
    {
        $comments = Comments::where('user_id',Auth::user()->id)->where('parent_id', null)->paginate(12);
        return view('comments.index', compact('comments'));
    }

    public function show($id)
    {
        $comments = Comments::with('user','admin', 'childrenRecursive')->findOrFail($id);
        return view('comments.show', compact('comments'));
    }
}
