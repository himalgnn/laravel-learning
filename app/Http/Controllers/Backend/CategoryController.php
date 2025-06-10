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
        $panel = 'Category';
        $record = Category::findOrFail($category->id);
        return view('backend.category.edit', compact('panel', 'record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        $request->request->add(['updated_by' => auth()->user()->id]);
        if ($category->update($request->all())) {
            return redirect()->route('backend.category.index')->with('success', 'Category updated successfully.');
        } else {
            return redirect()->route('backend.category.index')->with('error', 'Failed to update category.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
       
        if( ($category -> status = 'Inactive') && $category->delete()){
            return redirect()->route('backend.category.index')->with('success', 'Category Trashed successfully.');
        } else {
            return redirect()->route('backend.category.index')->with('error', 'Failed to trash category.');
        }
    }

    public function showTrash(){
        $panel = 'Category';
        $records = Category::onlyTrashed()->get();
        return view('backend.category.trash', compact('panel','records'));
    }

    public function deleteTrash($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        if ($category->forceDelete()) {
            return redirect()->route('backend.category.trash')->with('success', 'Category deleted permanently.');
        } else {
            return redirect()->route('backend.category.trash')->with('error', 'Failed to delete category permanently.');
        }
    }

    public function restoreTrash($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        if ($category->restore()) {
            return redirect()->route('backend.category.trash')->with('success', 'Category restored successfully.');
        } else {
            return redirect()->route('backend.category.trash')->with('error', 'Failed to restore category.');
        }
    }
}
