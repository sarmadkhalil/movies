<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
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

        return view('admin.users.index')->with('users', $users);
        
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserCreateRequest $request)
    {
        $validated = $request->validated();

        $this->userService->createNonAdminUser($validated);

        return redirect()->route('admin.users.index');
    }

    public function delete(int $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
