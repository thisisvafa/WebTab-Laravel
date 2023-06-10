<?php

namespace App\Repositories\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersRepository implements UsersInterface
{
    public function getUsers()
    {
        return User::latest()->paginate(10);
    }

    public function storeUser($data)
    {
        if($file = $data->file('avatar')){
            $path = Storage::disk('local')->put('public/Users', $file);
        }
        return User::create([
            'name' => $data->name,
            'lastname' => $data->surname,
            'email' => $data->surname,
            'password' => Hash::make($data->password),
            'gender' => $data->gender,
            'national_code' => $data->national_code,
            'phonenumber' => $data->phonenumber,
            'image_path' => $path ?? null,
        ]);
    }

    public function findUser($id)
    {
        return User::find($id);
    }

    public function updateUser($data, $id)
    {
        $user = User::findOrFail($id);
        if($file = $data->file('avatar')){
            $path = Storage::disk('local')->put('public/Users', $file);
        } else {
            $path = $user->image_path;
        }

        if(trim($data->input('password') != "")){
            $password = Hash::make($data->password);
        } else {
            $password = $user->password;
        }

        return $user->update([
            'name' => $data->name,
            'lastname' => $data->surname,
            'email' => $data->surname,
            'password' => $password,
            'gender' => $data->gender,
            'national_code' => $data->national_code,
            'phonenumber' => $data->phonenumber,
            'image_path' => $path,
        ]);
    }

    public function destroyUsers($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
