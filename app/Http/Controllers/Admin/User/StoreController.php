<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Repositories\Users\UsersInterface;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private $userRepository;

    public function __construct(UsersInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(CreateRequest $request)
    {
        $this->userRepository->storeUser($request);
        return redirect()->route('userAdmin');
    }
}
