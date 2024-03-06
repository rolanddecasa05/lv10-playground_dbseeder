<?php

namespace App\Pgmodules\Contracts;

interface EloquentRepositoryInterface {
    public function find(array $attr);
    public function findById(string $id);
    public function create(array $data);
    public function update(string $id, array $data);
    public function delete(string $id);
}