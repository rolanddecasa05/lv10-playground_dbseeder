<?php

namespace App\Pgmodules\Services;

use App\Pgmodules\Contracts\UserCrudInterface;

class UserService  {

    public function __construct(public UserCrudInterface $repository) {}

    public function find(array $attr)
    {
        return $this->repository->find($attr);
    }

    public function findById($id) {
        return $this->repository->findByid($id);
    }

    public function create($data)
    {
        return $this->repository->create(data: $data);
    }

    public function update($id, $data)
    {
        return $this->repository->update(id: $id, data: $data);
    }

    public function delete($id)
    {
        return $this->repository->delete(id: $id);
    }

}