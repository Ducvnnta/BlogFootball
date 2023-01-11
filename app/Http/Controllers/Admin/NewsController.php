<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Category;
use App\Models\News;
use Str;
use  App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends BaseController
{
    use UploadTrait;

    public function index(Request $request)
    {
        $perPage       = $request->per_page;
        $page          = $request->page;
        $perPage = $perPage ? $perPage : 10;
        $news = News::with('category')->orderBy('id', 'DESC');
        $news = $news->paginate($perPage);
        return view('admin.news.index', compact('news'));
    }

    // public function category()
    // {
    //     $categories = Category::with('categories')->latest()->paginate(10);
    //     return view('admin.category.category', compact('categories'));
    // }

    // public function editCategory($id)
    // {
    //     $category = Category::find($id);
    //     return view('admin.category.edit', compact('category'));
    // }


    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        $news = null;
        return view('admin.news.create', compact('categories', 'news'));
    }

    public function detail($id)
    {
        $new = News::find($id);
        $view =  $new->reads;
        $comment = $new->whereHas('comments', function ($q)
        {
            $q->whereNotNull('comments.new_id');
        })->count();
        return view('admin.news.detail', compact('new', 'view', 'comment'));
    }

    public function store(CreateNewsRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->getData();
            $image = $request->file('image_url');
            $data['image_url'] = $this->uploadImage($image, 'news');
            $data['slug'] = Str::slug($data['title']);
            $news = News::create($data);
            DB::commit();
            return redirect()->route('admin.news')->withFlashSuccess('Tạo mới tin tức thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        } //end try
    }

    public function edit($id)
    {
      $news = News::findOrFail($id);
      $categories = Category::all()->pluck('name', 'id');
      return view('admin.news.edit', compact('categories', 'news'));
    }

    public function update(UpdateNewsRequest $request, $id)
    {

            $news = News::findOrFail($id);
            $data = $request->getData();
            $data['slug'] = Str::slug($data['title']);
            if($request->hasFile('image_url')){
              $image = $request->file('image_url');
              $data['image_url'] = $this->uploadImage($image, 'news');
            }else{
              $data['image_url'] = $request->get('old_image_url');
            }
            $news->update($data);
            DB::commit();
            return redirect()->route('admin.news')->withFlashSuccess('Cập nhật tin tức thành công');
    }

    public function destroy($id){
      try {
        DB::beginTransaction();
        $news = News::findOrFail($id);
        $news->delete();
        DB::commit();
        return redirect()->route('admin.news')->withFlashSuccess('Xoá tin tức thành công');
      } catch (\Exception $e) {
          DB::rollBack();
          return redirect()->back()->withErrors($e->getMessage());
      } //end try
    }
}
