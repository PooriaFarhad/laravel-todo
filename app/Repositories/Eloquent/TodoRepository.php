<?php
/**
 * Created by PhpStorm.
 * User: pooriafarhad
 * Date: 9/23/18
 * Time: 2:21 AM
 */

namespace App\Repositories\Eloquent;


use App\Repositories\Models\Todo;

class TodoRepository extends BaseRepository
{
    public function __construct(Todo $model)
    {
        parent::__construct($model);
    }

    public function getTodos($completed = null, $q = null, $paginate = 10)
    {
        $todos = $this->model->orderBy('id', 'desc');
        if (isset($completed)) {
            $todos->completed();
        }
        if ($q) {
            $todos->where('title', 'LIKE', '%' . $q . '%');
        }
        return $todos->paginate($paginate);
    }
}