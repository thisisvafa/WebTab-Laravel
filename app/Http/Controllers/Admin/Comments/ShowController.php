<?php

namespace App\Http\Controllers\Admin\Comments;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Repositories\Comments\CommentsInterface;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    private $commnetsRepository;

    public function __construct(CommentsInterface $commnetsRepository)
    {
        $this->commnetsRepository = $commnetsRepository;
    }

    public function index()
    {
        $comments = $this->commnetsRepository->getComments();
        return view('admin.comments.index', compact('comments'));
    }

    public function show($id)
    {
        $comments = $this->commnetsRepository->showComments($id);
        return view('admin.comments.show', compact('comments'));
    }
}
