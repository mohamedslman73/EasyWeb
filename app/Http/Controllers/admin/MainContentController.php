<?php

namespace App\Http\Controllers\admin;

use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class MainContentController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.mainContent.index');
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.mainContent.create');
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Content::create($request->all());
        return redirect('lead/content');
    }

    /*
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        return view('admin.mainContent.edit',compact('content'));
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request,Content $content)
    {
        $content->update($request->all());
        return  redirect('lead/content');
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    }
    public function datatable()
    {
        $content=Content::all();
        return Datatables::of($content)->editColumn('control',function ($model){
        $data=renderOptions($model,'MainContentController','content',true);
        return $data;
    })
        ->make(true);
    }
}
