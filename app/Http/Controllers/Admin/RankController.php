<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Rank;
use App\Models\News;
use App\Models\RankCategory;
use Illuminate\Http\Request;

class RankController extends Controller
{
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
}
