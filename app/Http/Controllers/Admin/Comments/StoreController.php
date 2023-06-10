<?php

namespace App\Http\Controllers\Admin\Comments;

use App\Http\Controllers\Controller;
use App\Repositories\Comments\CommentsInterface;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private $commnetsRepository;

    public function __construct(CommentsInterface $commnetsRepository)
    {
        $this->commnetsRepository = $commnetsRepository;
    }

    public function store(Request $request)
    {
        $this->commnetsRepository->storeComments($request);
        return redirect()->back();
    }
}
