<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $panel = 'Category';
        $records = Category::all();
        return view('backend.category.index', compact('panel','records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.category.create', ['panel' => 'Category']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        // dd($request->all());
        $request->request->add(['image' => 'image.png']);
        $request->request->add(['icon' => 'icon.png']);
        $request->request->add(['created_by' => auth()->user()->id]);

        Category::create($request->all());
        return redirect()->route('backend.category.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function showTrash(){
        $panel = 'Category Trash';
        $records = Category::onlyTrashed()->get();
        return view('backend.category.trash', compact('panel','records'));
    }
}
