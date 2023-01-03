<?php

namespace App\Services\Category;

use App\Repositories\Category\CategoryRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryService implements CategoryServiceInterface
{
   /**
     * @var $categoryRepository
     */
    protected $categoryRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function create($request)
    {
        try {
            $category = $this->categoryRepository->create([
                'name' =>  $request->name,
                'slug' =>  $request->slug,
                'source' => $request->source,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return $category;
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function update($request, $id)
    {
        $data = $request->only([
            'name',
            'slug',
            'source',
        ]);
            // $category = $this->categoryRepository->find($id);
            return  $this->categoryRepository->update($id, $data);

    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function getCategoryById($id)
    {
        $category = $this->categoryRepository->find($id);

        return $category;
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $category = $this->categoryRepository->delete($id);
        return $category;
    }


}

