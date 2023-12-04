<?php

namespace App\Services\Internal\User;

use Illuminate\Pagination\LengthAwarePaginator;

interface UserService
{    
    /**
     * getNonAdminUsers
     *
     * @return LengthAwarePaginator
     */
    public function getNonAdminUsers() : LengthAwarePaginator;
    
    /**
     * createNonAdminUser
     *
     * @param  mixed $request
     * @return void
     */
    public function createNonAdminUser($request) : void;
}
