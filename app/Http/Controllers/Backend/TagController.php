<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use View;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $base_route = 'backend.tag.';
    public $base_view = 'backend.tag.';
    public $panel = 'Tag';
    public $base_image_folder = 'tag/images';
    public 
     function __construct(){
        View::share('panel', $this->panel);
        View::share('base_route',$this->base_route);
     }
    public function index()
    {
        //
        $panel = $this->panel.'';
        $records = Tag::all();
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
    public function store(StoreTagRequest $request)
    {
        //
        // dd($request->all());
        $request->request->add(['image' => 'image.png']);
        $request->request->add(['icon' => 'icon.png']);
        $request->request->add(['created_by' => auth()->user()->id]);

        Tag::create($request->all());
        return redirect()->route($this->base_route.'index')->with('success', $this->panel.' created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
        $panel = $this->panel;
        $record = Tag::findOrFail($tag->id);
        return view($this->base_route.'edit', compact('panel', 'record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //
        $request->request->add(['updated_by' => auth()->user()->id]);
        if ($tag->update($request->all())) {
            return redirect()->route($this->base_route.'index')->with('success', $this->panel.' updated successfully.');
        } else {
            return redirect()->route($this->base_route.'index')->with('error', 'Failed to update Tag.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
       
        if( ($tag -> status = 'Inactive') && $tag->delete()){
            return redirect()->route($this->base_route.'index')->with('success', $this->panel.' Trashed successfully.');
        } else {
            return redirect()->route($this->base_route.'index')->with('error', 'Failed to trash Tag.');
        }
    }

    public function showTrash(){
        $panel = $this->panel.'';
        $records = Tag::onlyTrashed()->get();
        return view($this->base_route.'trash', compact('panel','records'));
    }

    public function deleteTrash($id)
    {
        $tag = Tag::withTrashed()->findOrFail($id);
        if ($tag->forceDelete()) {
            return redirect()->route($this->base_route.'trash')->with('success', $this->panel.' deleted permanently.');
        } else {
            return redirect()->route($this->base_route.'trash')->with('error', 'Failed to delete '.$this->panel.' permanently.');
        }
    }

    public function restoreTrash($id)
    {
        $tag = Tag::withTrashed()->findOrFail($id);
        if ($tag->restore()) {
            return redirect()->route($this->base_route.'trash')->with('success', $this->panel.' restored successfully.');
        } else {
            return redirect()->route($this->base_route.'trash')->with('error', 'Failed to restore Tag.');
        }
    }
}
