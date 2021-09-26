<?php

namespace App\Repositories;

class Repository
{
    protected $model;

    public function __construct()
    {
        //
    }

    public function raw()
    {
        return $this->model;
    }

    public function store(array $params)
    {
        return $this->model->create($params);
    }

    // public function find($select = "*", array $where = [], array $with = [], $paginate = null)
    // {
    //     $query = $this->model->select($select)->where($where)->with($with);
    //     return is_null($paginate) ? $query->get() : $query->paginate($paginate);
    // }
}
