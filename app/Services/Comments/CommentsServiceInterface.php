<?php

namespace App\Services\Comments;

interface CommentsServiceInterface
{

    public function create($request, $newId);

    public function getCategoryById($id);

    public function update($request, $id);

    public function delete($id);

}
