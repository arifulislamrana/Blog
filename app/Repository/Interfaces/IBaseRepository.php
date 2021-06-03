<?php
namespace App\Repository\Interfaces;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

interface IBaseRepository {
    public function create($attributes): Model;
    public function update($id, $attributes): Model;
    public function destroy($id): bool;
    public function find($id): Model;
    public function all(): Collection;
}

?>