<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Rank;
use App\Models\News;
use App\Models\RankCategory;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class RankController extends Controller
{
    use ApiResponser;
    use UploadTrait;

    /**
     * @var $rankCategoriesService
     */
    protected $rankCategoriesService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        RankCategoriesServiceInterface $rankCategoriesService
    ) {
        $this->rankCategoriesService = $rankCategoriesService;
    }
    public function rankdetail($id){
        $rank = RankCategory::with('rankings')->findOrFail($id);
        $categoriesch = Category::limit(8)->get();
        $new = News::all()->random(10);
        return view('web.news.rank', compact('rank','categoriesch','new'));
    }
}
