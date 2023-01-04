<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Rank;
use App\Models\RankCategory;
use App\Models\Schedule;
use App\Models\ScheduleCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   public function titlehot(){
    $news = News::latest()->limit(9)->get();
    // $day = News::inRandomOrder()->limit(10);
    $day = News::with('category')->get()->random(12);
    $slide = News::with('category')->oldest()->get()->random(15);
    $rank = RankCategory::with('rankings')->get();
    $categories = Category::limit(20)->get();
    $namesch = ScheduleCategory::oldest()->get();
    $schedules = Schedule::with('schedulings')->latest()->limit(10)->get();
    return view('web.home', compact('news','slide','rank','day','categories','schedules','namesch'));
   }

   public function getSearch(Request $request){
       $keyword = $request->get('keyword');
       $query = News::with('category')->latest();
       if($keyword){
            $keyword = preg_replace('/\s+/', '%', $keyword);
            $query = $query->where('title', 'LIKE', "%$keyword%")
                           ->orWhere('description', 'LIKE', "%$keyword%")
                           ->orWhere('detail','LIKE',"%$keyword%")
                           ->whereHas('category', function ($q) use ($keyword) {
                            $q->where('categories.name', $keyword);
                           });
       }
       $news = $query->paginate(4);
       return view('web.search' , compact('news'));
   }


}
