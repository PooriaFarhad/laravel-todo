<?php

namespace App\Repositories\Eloquent;

abstract class BaseRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function updateById($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }
}