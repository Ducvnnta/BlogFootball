<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\PostCommentsRequest;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Rank;
use App\Models\RankCategory;
use App\Services\Comments\CommentsServiceInterface;
use App\Traits\ApiResponser;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;

class Detailnewscontroller extends Controller
{
    use ApiResponser;
    use UploadTrait;

    /**
     * @var $commentsService
     */
    protected $commentsService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CommentsServiceInterface $commentsService
    ) {
        $this->commentsService = $commentsService;
    }

    public function detailnews($id){
        $detail = News::findOrFail($id);
        return view('detail.detailnews', compact('detail'));
    }

    public function comments($id){
        $comments = Comment::findOrFail($id);
        return view('web.news.show', compact('comments'));
    }

    public function postComment(PostCommentsRequest $request,$newId)
    {
        $comment = $this->commentsService->create($request,$newId);
        return redirect()->back()->with('success', 'Bạn đã comments thành công');

    }
}
