<?php

namespace App\Services\RankCategories;

interface RankCategoriesServiceInterface
{

    public function create($request);

    public function getCategoryById($id);

    public function update($request, $id);

    public function delete($id);

}
