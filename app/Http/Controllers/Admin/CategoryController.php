<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Models\Category;
use App\Models\News;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Services\Category\CategoryServiceInterface;
use App\Traits\ApiResponser;
use App\Traits\UploadTrait;


class CategoryController extends Controller
{
    use ApiResponser;
    use UploadTrait;

    /**
     * @var $categoryService
     */
    protected $categoryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CategoryServiceInterface $categoryService
    ) {
        $this->categoryService = $categoryService;
    }


    public function category()
    {
        $categories = Category::with('categories')->latest()->paginate(10);
        return view('admin.category.category', compact('categories'));
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }


    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.category.create', compact('categories'));
    }

    // public function detail($id)
    // {
    //     $new = News::find($id);
    //     return view('admin.news.detail', compact('new'));
    // }

    public function store(CreateCategoryRequest $request)
    {
            $result = $this->categoryService->create($request);
            return redirect()->route('admin.category')->withFlashSuccess('Tạo danh mục mới thành công');

    }

    public function update(CreateCategoryRequest $request, $id)
    {
            $result = $this->categoryService->update($request, $id);
            return redirect()->route('admin.category')->withFlashSuccess('Cập nhật danh mục thành công');
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $result = $this->categoryService->delete($id);
        return redirect()->route('admin.category')->withFlashSuccess('Xóa danh mục thành công');
    }
}
