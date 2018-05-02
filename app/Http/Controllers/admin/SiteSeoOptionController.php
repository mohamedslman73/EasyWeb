<?php

namespace App\Http\Controllers\admin;

use App\SiteSeoOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class SiteSeoOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.siteoption.index');
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.siteoption.create');
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title'              =>'required',
            'meta_description_ar' =>'required',
            'meta_description_en'=>'required' ,
            'meta_keywords_ar'=>'required' ,
            'meta_keywords_en'=>'required' ,
            'social_description'=>'required' ,
        ]);
        SiteSeoOption::create($request->all());


        return redirect(url('lead/siteoption'));



    }

    /*
     * Display the specified resource.
     */
    public function show()
    {

    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit(SiteSeoOption $siteoption)
    {

        return view('admin.siteoption.edit',compact('siteoption'));

    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteSeoOption $siteoption)
    {
        $siteoption->update($request->all());
        return redirect('lead/siteoption');
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy(SiteSeoOption $siteoption)
    {
        $siteoption->delete();
        return back();
    }
    public function datatable()
    {


        $siteSeoOption=SiteSeoOption::all();

        return Datatables::of($siteSeoOption)


            ->editColumn('control',function ($model){
                $data=renderOptions($model,'SiteSeoOptionController','siteoption');
                return $data;
            })
            ->make(true);

    }
}
