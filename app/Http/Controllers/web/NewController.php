<?php

namespace App\Http\Controllers\web;

use App\Exceptions\Handler;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;
use App\Repositories\News\NewsRepositoryInterface;
use App\Services\News\NewsServiceInterface;
use App\Traits\ApiResponser;
use App\Traits\UploadTrait;

class NewController extends Controller
{
    use ApiResponser;
    use UploadTrait;

    /**
     * @var $userService
     */
    protected $newsRepository;
    protected $newsService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        NewsRepositoryInterface $newsRepository,
        NewsServiceInterface $newsService
    ) {
        // $this->middleware('guest:admin')->except('logout');
        $this->newsRepository = $newsRepository;
        $this->newsService = $newsService;
    }


    public function show($id){
        $news = News::findOrFail($id);
        $icre = $this->newsRepository->incrementReadCount($id);
        $view =  $news->reads;
        $comment = $news->whereHas('comments', function ($q)
        {
            $q->whereNotNull('comments.new_id');
        })->count();
        $new = News::all()->random(10);
        $categories = Category::limit(8)->get();
        // Event::fire(new Handler(), $news);
        return view('web.news.show', compact('news','categories','new', 'view', 'comment'));
    }


}
