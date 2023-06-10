<?php

namespace App\Http\Controllers\Admin\Comments;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Repositories\Comments\CommentsInterface;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    private $commnetsRepository;

    public function __construct(CommentsInterface $commnetsRepository)
    {
        $this->commnetsRepository = $commnetsRepository;
    }

    public function destroy($id)
    {
        $this->commnetsRepository->destroyComments($id);
        return redirect()->route('commentsAdmin');
    }
}
