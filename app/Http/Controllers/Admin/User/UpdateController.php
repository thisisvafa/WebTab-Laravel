<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Repositories\Users\UsersInterface;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    private $userRepository;

    public function __construct(UsersInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function edit($id)
    {
        $user = $this->userRepository->findUser($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $this->userRepository->updateUser($request, $id);
        return redirect()->route('userAdmin');
    }
}
