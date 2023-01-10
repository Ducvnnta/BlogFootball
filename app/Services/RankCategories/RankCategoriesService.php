<?php

namespace App\Services\RankCategories;

use App\Models\RankCategory;
use App\Repositories\RankCategories\RankCategoriesRepositoryInterface;
use App\Traits\UploadTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RankCategoriesService implements RankCategoriesServiceInterface
{
    use UploadTrait;
   /**
     * @var $rankCategoriesRepository
     */
    protected $rankCategoriesRepository;

    public function __construct(
        RankCategoriesRepositoryInterface $rankCategoriesRepository
    ) {
        $this->rankCategoriesRepository = $rankCategoriesRepository;
    }

    public function create($request)
    {
            $category = $this->rankCategoriesRepository->create([
                'name' =>  $request->name,
                'image' =>  $this->uploadImage($request->image, 'rankcategories'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return $category;
    }

    public function update($request, $id)
    {
        $data = $request->only([
            'name',
            'image',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
            // $category = $this->categoryRepository->find($id);
            return  $this->rankCategoriesRepository->update($id, $data);

    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function getCategoryById($id)
    {
        $category = $this->rankCategoriesRepository->find($id);

        return $category;
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $category = $this->rankCategoriesRepository->delete($id);
        return $category;
    }


}

