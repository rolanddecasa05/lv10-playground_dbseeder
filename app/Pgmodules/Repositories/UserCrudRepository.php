<?php

namespace App\Pgmodules\Repositories;

use App\Models\User;
use App\Pgmodules\Contracts\UserCrudInterface;
use App\Pgmodules\Repositories\EloquentRepository;

class UserCrudRepository extends EloquentRepository implements UserCrudInterface {

    public function __construct(public User $user)
    {
        parent::__construct($this->user);
    }
}