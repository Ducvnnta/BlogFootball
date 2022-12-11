<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;

class NewController extends Controller
{
    public function show($id){
        $news = News::findOrFail($id);
        $new = News::all()->random(10);
        $categories = Category::limit(8)->get();
        return view('web.news.show', compact('news','categories','new'));
    }
}
