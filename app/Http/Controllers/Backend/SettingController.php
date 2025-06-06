<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       $setting = Setting::first();
        if($setting){
            return redirect()->route('backend.setting.edit',$setting->id);
        } else {
            return view('backend.setting.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSettingRequest $request)
    {
        
         // if ($request->hasFile('logo_top_file')){Add commentMore actions
        //     $file = $request->file('logo_top_file');
        //     $logoTop = time() . '_' . $file->getClientOriginalName();
        //     $file->move('images/setting',$logoTop);
        //     $request->request->add(['logo_top' => $logoTop]);
        // }
             $request->request->add(['logo_top' => 'top.png']);
             $request->request->add(['logo_bottom' => 'hello.png']);
             $request->request->add(['favicon' => 'favicon.png']);
             $request->request->add(['created_by' => auth()->user()->id]);
            //  $request->request->add(['logo_top' => 'top.png']);


        // if ($request->hasFile('logo_bottom_file')){
        //     $file1 = $request->file('logo_bottom_file');
        //     $logoBottom = time() . '_' . $file1->getClientOriginalName();
        //     $file1->move('images/setting',$logoBottom);
        //     $request->request->add(['logo_bottom' => $logoBottom]);
        // }
        // if ($request->hasFile('favicon_file')){
        //     $file2 = $request->file('favicon_file');
        //     $favicon = time() . '_' . $file2->getClientOriginalName();
        //     $file2->move('images/setting',$favicon);
        //     $request->request->add(['favicon' => $favicon]);
        // }
        $record = Setting::create($request->all());
         if($record){
            return redirect()->route('backend.setting.create')->with('success','Setting Creation Success!!!');
        } else {
            return redirect()->route('backend.setting.create')->with('error','Setting Creation Failed!!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('backend.settings.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
