<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CategoriesController
 * @package App\Http\Controllers\Admin
 */
class CategoriesController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['active'] = 'categories';
        $data['categories'] = Category::latest()->paginate(10);
        return view('admin.categories.index', $data);
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        $data['active'] = 'categories';
        $data['category'] = $category;
        return view('admin.categories.edit', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['active'] = 'categories';
        return view('admin.categories.create', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $category = Category::create([
            'title' => $request->input('title')
        ]);

        return redirect()->to(route('categories.index'))->with("message", "Category Added Successfully");
    }

    /**
     * @param Category $category
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Category $category, Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $category->update([
            'title' => $request->input('title')
        ]);

        return redirect()->back()->with("message", "Category updated Successfully");
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->posts()->detach();
        $category->delete();
        return redirect()->to(route('categories.index'))->with("message", "Category deleted Successfully");
    }


}
