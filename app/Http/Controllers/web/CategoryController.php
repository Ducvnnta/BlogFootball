<?php

namespace App\Http\Controllers\web;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function categorydetail($id){
        $categories = Category::with('categories')->findOrFail($id);
        return view ('web.news.category', compact('categories'));
    }
}
