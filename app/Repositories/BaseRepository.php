<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use stdClass;

class BaseRepository implements BaseRepositoryInterface
{
  public function __construct(
    protected Model $model
  ){}


  public function all(): array
  {
      return (array) $this->model->all();
  }

  public function find(int $id): stdClass
  {
    return (object) $this->model->findOrFail($id)->toArray();
  }

  protected function format(Model $model): stdClass
  {
    return (object) $model->toArray();
  }
}
