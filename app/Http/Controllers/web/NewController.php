<?php

namespace App\Http\Controllers\web;

use App\Exceptions\Handler;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
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
        $icre = $this->newsRepository->incrementReadCount($news);
        $view =  $news->reads;
        // $newHasComment = News::whereHas('comments', function ($q) use ($id)
        // {
        //     $q->where('comments.new_id', $id);
        // });
        $newHasComment = Comment::where('new_id', $id);
        $comment = $newHasComment->count();
        $comments = $newHasComment->orderBy('id', 'DESC');
        $new = News::all()->random(10);
        $categories = Category::limit(8)->get();
        return view('web.news.show', compact('news','categories','new', 'view', 'comment', 'comments'));
    }


}
