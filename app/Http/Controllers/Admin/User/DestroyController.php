<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Repositories\Users\UsersInterface;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    private $userRepository;

    public function __construct(UsersInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function destroy($id)
    {
        $this->userRepository->destroyUsers($id);
        return redirect()->route('userAdmin');
    }
}
