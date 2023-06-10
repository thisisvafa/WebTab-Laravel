<?php

namespace App\Http\Controllers\Admin\Comments;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Repositories\Comments\CommentsInterface;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    private $commnetsRepository;

    public function __construct(CommentsInterface $commnetsRepository)
    {
        $this->commnetsRepository = $commnetsRepository;
    }

    public function edit($id)
    {
        $comment = $this->commnetsRepository->findComments($id);
        return view('admin.comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $idComment = $this->commnetsRepository->updateComments($request, $id);
        return redirect()->route('commentsShowAdmin', $idComment);
    }
}
