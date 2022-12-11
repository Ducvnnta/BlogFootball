<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Rank;
use App\Models\RankCategory;
use Illuminate\Support\Facades\DB;

class detailnewscontroller extends Controller
{
    public function detailnews($id){
        $detail = News::findOrFail($id);
        return view('detail.detailnews', compact('detail'));
    }
}
