<?php

namespace App\Services\Category;

interface CategoryServiceInterface
{

    public function create($request);

    public function getCategoryById($id);

    public function update($request, $id);

    public function delete($id);

}
