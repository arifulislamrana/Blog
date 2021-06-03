<?php

namespace App\Repository\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Repository\Interfaces\IBaseRepository;

class BaseRepository implements IBaseRepository {
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes): Model
    {
        return $this->model->where(['id' => $id])->update($attributes);
    }

    public function destroy($id): bool
    {
        return $this->model->destroy($id);
    }

    public function find($id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

}

?>