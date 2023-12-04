<?php

namespace App\Services\Internal\User\Impl;

use App\Models\User;
use App\Services\Internal\User\UserService;
use Illuminate\Pagination\LengthAwarePaginator;

class UserServiceImpl implements UserService
{
    public function getNonAdminUsers(): LengthAwarePaginator
    {
        return User::where('is_admin', false)->paginate();
    }

    public function createNonAdminUser($request): void
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt('password'),
        ]);
    }
}
