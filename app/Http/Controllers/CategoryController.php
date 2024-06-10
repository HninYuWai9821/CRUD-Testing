<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Category\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    public function index()
    {
        $categories = Category::paginate(5);
        return view('category.index')->with(['categories' => $categories]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'categoryName' => 'required|min:3|max:255'
        ]);

        $category = $this->categoryService->storeCategory($data);

        return redirect()->route('categories.index')->withSuccess($category->categoryName . ' added successfully.');
    }

    public function show($id)
    {
        $category = $this->categoryService->showCategory($id);

        if(!$category){
            return redirect()->route('categories.index')->with('error','Category Not Found!');
        }

        return view('category.show')->with(['category' => $category]);
    }


    public function edit($id)
    {
        $category = $this->categoryService->editCategory($id);
        if(!$category){
            return redirect()->route('categories.index')->with('error','Category Not Found!');
        }
        return view('category.edit')->with(['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        // $data = $request->validate([
        //     'name' => 'required|string|min:2|max:255',
        // ]);

        $data['categoryName']= $request->name;

        $category = $this->categoryService->updateCategory($data, $id);

        return redirect()->route('categories.index')
        ->withSuccess('updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('categories.index')
            ->withSuccess('deleted successfully.');
    }

}
