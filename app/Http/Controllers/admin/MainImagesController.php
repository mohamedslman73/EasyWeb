<?php

namespace App\Http\Controllers\admin;

use App\FixedImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class MainImagesController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.mainImages.index');
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mainImages.create');
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>"required",
            'img'=>"required|image",
        ]);
        $img=$request->file('img')->store('main/images');
        $request->merge(['image'=>$img]);
        FixedImage::create($request->all());
        return redirect('lead/images');
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
    public function edit(FixedImage $image)
    {
        return view('admin.mainImages.edit',compact('image'));
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request,FixedImage $image)
    {
        $this->validate($request,[
            'name'=>"required",
            'img'=>"required|image",
        ]);
        $img=$request->file('img')->store('main/images');
        $request->merge(['image'=>$img]);

        $image->update($request->all());
        return  redirect('lead/images');
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }


    public function datatable()
    {
        $images=FixedImage::all();
        return Datatables::of($images)->editColumn('control',function ($model){
            $data=renderOptions($model,'MainImagesController','images',true);
            return $data;
        })
            ->make(true);
    }
}
