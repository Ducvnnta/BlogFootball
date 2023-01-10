<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RankCategories\CreateRankCategoriesResquest;
use App\Models\Category;
use App\Models\Rank;
use App\Models\News;
use App\Models\RankCategory;
use App\Services\RankCategories\RankCategoriesServiceInterface;
use App\Traits\ApiResponser;
use App\Traits\UploadTrait;
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

    public function list(Request $request){
        $perPage       = $request->per_page;
        $page          = $request->page;
        $perPage = $perPage ? $perPage : 10;
        $rank = RankCategory::with('rankings')->orderBy('id', 'DESC');
        $rank = $rank->paginate($perPage);
        $categoriesch = Category::limit(8)->get();
        $new = News::all()->random(10);
        return view('admin.rank.rank', compact('rank','categoriesch','new'));
    }

    public function create()
    {
        $rank = RankCategory::all()->pluck('name', 'id');
        $news = null;
        return view('admin.rank.create', compact('rank', 'news'));
    }

    public function edit($id)
    {
        // $rankCategory = null;
        $rankCategory = RankCategory::find($id);
        return view('admin.rank.edit', compact('rankCategory'));
    }

    public function store(CreateRankCategoriesResquest $request)
    {
            $result = $this->rankCategoriesService->create($request);
            return redirect()->route('get.list.rank')->withFlashSuccess('Tạo giải đấu mới thành công');

    }

    public function update(CreateRankCategoriesResquest $request, $id)
    {
            $result = $this->rankCategoriesService->update($request, $id);
            return redirect()->route('get.list.rank')->withFlashSuccess('Cập nhật Giải đấu thành công');
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $result = $this->rankCategoriesService->delete($id);
    }
}
