<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Rank;
use App\Models\Category;
use App\Models\News;
use App\Models\RankCategory;
use App\Models\ScheduleCategory;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function scheduledetail($id){
        $schedule = ScheduleCategory::with('schedules')->findOrFail($id);
        $categories = Category::limit(8)->get();
        $new = News::all()->random(10);
        return view('web.news.schedule',compact('schedule','categories','new'));
    }
}
