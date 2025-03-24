<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
  public function __construct(
    protected Model $model
  ){}

  public function find(int $id)
  {
    return $this->model->findOrFail($id)->toArray();
  }

//   public function create(array $data)
//   {
//     return $this->model->create($data)->toArray();
//   }
}
