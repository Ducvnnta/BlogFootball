<?php

namespace App\Services\Comments;

use App\Models\RankCategory;
use App\Repositories\Comments\CommentsRepositoryInterface;
use App\Repositories\RankCategories\RankCategoriesRepositoryInterface;
use App\Traits\UploadTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentsService implements CommentsServiceInterface
{
    use UploadTrait;
   /**
     * @var $CommentsRepository
     */
    protected $CommentsRepository;

    public function __construct(
        CommentsRepositoryInterface $CommentsRepository
    ) {
        $this->CommentsRepository = $CommentsRepository;
    }

    public function create($request, $newId)
    {
            $category = $this->CommentsRepository->create([
                'text' =>  $request->text,
                'new_id' =>  $newId,
                'user_id' =>  Auth::id(),
                'is_start' =>  FALSE,
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
            return  $this->CommentsRepository->update($id, $data);

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

