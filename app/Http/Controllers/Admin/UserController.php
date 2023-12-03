<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Internal\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getNonAdminUsers();

        return view('admin.user.index');
        
    }
}
