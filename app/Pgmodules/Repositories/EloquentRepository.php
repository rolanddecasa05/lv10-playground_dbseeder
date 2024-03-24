<?php

namespace App\Pgmodules\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Pgmodules\Contracts\EloquentRepositoryInterface;
use App\Pgmodules\Traits\DBtransactionHandler;

abstract class EloquentRepository implements EloquentRepositoryInterface {
    use DBtransactionHandler;

    public function __construct(public Model $model) {}

    public function find(array $attr)
    {
        return $this->model::paginate((array_key_exists('paginate', $attr)) ? $attr['paginate'] : 10);
    }

    public function findById($id)
    {
        return $this->model::findOrFail($id);
    }

    public function create(array $data)
    {
        return self::execute($this->model::create($data));
    }

    public function update(string $id, array $data)
    {
        return self::execute($this->model::findOrFail($id)->update($data));
    }

    public function delete(string $id)
    {
        return self::execute($this->model::findOrFail($id)->delete());
    }
}