<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use View;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $base_route = 'backend.category.';
    public $base_view = 'backend.category.';
    public $panel = 'Category';
    public $base_image_folder = 'category/images';
    public 
     function __construct(){
        View::share('panel', $this->panel);
        View::share('base_route',$this->base_route);
     }
    public function index()
    {
        //
        $panel = $this->panel.'';
        $records = Category::all();
        return view($this->base_view.'index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view($this->base_route.'create', ['panel' => $this->panel.'']);
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
        return redirect()->route($this->base_route.'index')->with('success', $this->panel.' created successfully.');
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
        $panel = $this->panel;
        $record = Category::findOrFail($category->id);
        return view($this->base_route.'edit', compact('panel', 'record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        $request->request->add(['updated_by' => auth()->user()->id]);
        if ($category->update($request->all())) {
            return redirect()->route($this->base_route.'index')->with('success', $this->panel.' updated successfully.');
        } else {
            return redirect()->route($this->base_route.'index')->with('error', 'Failed to update category.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
       
        if( ($category -> status = 'Inactive') && $category->delete()){
            return redirect()->route($this->base_route.'index')->with('success', $this->panel.' Trashed successfully.');
        } else {
            return redirect()->route($this->base_route.'index')->with('error', 'Failed to trash category.');
        }
    }

    public function showTrash(){
        $panel = $this->panel.'';
        $records = Category::onlyTrashed()->get();
        return view($this->base_route.'trash', compact('panel','records'));
    }

    public function deleteTrash($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        if ($category->forceDelete()) {
            return redirect()->route($this->base_route.'trash')->with('success', $this->panel.' deleted permanently.');
        } else {
            return redirect()->route($this->base_route.'trash')->with('error', 'Failed to delete '.$this->panel.' permanently.');
        }
    }

    public function restoreTrash($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        if ($category->restore()) {
            return redirect()->route($this->base_route.'trash')->with('success', $this->panel.' restored successfully.');
        } else {
            return redirect()->route($this->base_route.'trash')->with('error', 'Failed to restore category.');
        }
    }
}
