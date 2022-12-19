<?php

namespace App\Repositories;

interface BaseRepositoryInterface {
    /**
     * Get All
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Get Paginate
     *
     * param $perPage
     * param $page
     * param $columns
     *
     * @return mixed
     */
    public function getPaginate($perPage, $page, $columns);

    /**
     * Get one
     * param $id
     * @return mixed
     */
    public function find($id);

    // /**
    //  * Get By
    //  * param $id
    //  * @return mixed
    //  */
    // public function findBy($attribute, $value);

    /**
     * create
     *
     * @param  array $attribute
     * @return mixed
     */
    public function create($attribute = []);

    /**
     * update
     *
     * @param $id
     * @param array $attribute
     * @return mixed
     */
    public function update($id, $attribute = []);

    /**
     * delete
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);

    // /**
    //  * update by condition
    //  *
    //  * @param array $condition
    //  * @param array $attribute
    //  * @return mixed
    //  */
    // public function updateByCondition($condition = [], $attribute = []);
}
