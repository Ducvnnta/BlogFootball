<?php

namespace App\Repositories;


abstract class BaseRepository implements BaseRepositoryInterface{

    /**
     * Model
     */
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * getAll
     *
     * @return object
    */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * getPaginate
     *
     * @param $perPage
     * @param $page
     * @param $columns
     *
     * @return mixed
     */
    public function getPaginate($perPage, $page, $columns = ['*']) {
        return $this->model->paginate($perPage, $columns, 'page', $page);
    }

    /**
     * find
     *
     * @param $id
     *
     * @return object
    */
    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }


    /**
     * create
     *
     * @param array $attribute
     *
     * @return object
     */
    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    /**
     * update
     *
     * @param $id
     * @param array $attribute
     *
     * @return bool
    */
    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * delete
     *
     * @param int
     *
     * @return bool
    */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
