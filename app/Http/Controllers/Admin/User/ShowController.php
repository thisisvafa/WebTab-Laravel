<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Repositories\Users\UsersInterface;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    private $userRepository;

    public function __construct(UsersInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users =  $this->userRepository->getUsers();
        return view('admin.user.index', compact('users'));
    }

    public function show($id)
    {
        //
    }
}
