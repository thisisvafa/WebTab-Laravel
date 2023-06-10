<?php

namespace App\Repositories\Users;

interface UsersInterface
{
    public function getUsers();

    public function storeUser($data);

    public function findUser($id);

    public function updateUser($data, $id);

    public function destroyUsers($id);
}
