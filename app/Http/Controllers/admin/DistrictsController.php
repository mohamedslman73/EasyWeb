<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\District;
use App\SeoDistricts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class DistrictsController extends Controller
{
    /* Display a listing of the resource
     */
    public function index()
    {
        return view('admin.districts.index');
    }

    /* Show the form for creating a new resource.
     */
    public function create()
    {
        $cities=City::pluck('name_en','id');
        return view('admin.districts.create',compact('cities'));
    }

    /*Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_ar'=>'required|arabic_only',
            'name_en'=>'required|english_only'
        ]);
        $request->merge(['slug_ar'=>make_slug($request->name_ar)]);
        $request->merge(['slug_en'=>make_slug($request->name_en)]);
        District::create($request->all());
        return redirect('/lead/districts');
    }

    /* Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /* Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        $cities=City::pluck('name_en','id');
        return view('admin.districts.edit',compact('district','cities'));
    }

    /* Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        $this->validate($request,[
            'name_ar'=>'required|arabic_only',
            'name_en'=>'required|english_only'
        ]);
        $request->merge(['slug_ar'=>make_slug($request->name_ar)]);
        $request->merge(['slug_en'=>make_slug($request->name_en)]);
        $district->update($request->all());
        return redirect('lead/districts');
    }

    /*Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        $district->delete();
        return redirect()->back();
    }
    //show districts in home page
    public function showDistrict(District $district)
    {
        if($district->show ==0)
        {
            $district->update(['show' => 1]);
        }else{
            $district->update(['show'=>0]);
        }
        return back();
    }
    /*to display datatables
     */
    public function datatable()
    {
        $districts=District::all();

        return DataTables::of($districts)
            ->editColumn('show',function ($model){
                $data=renderAction($model,'DistrictsController','showDistrict',$model->show);
                return $data;
            })
            ->editColumn('city_id',function ($model){
                $data=$model->City->name_en;
                return $data;
            })
            ->editColumn('control',function ($model){
                $data=renderOptions($model,'DistrictsController','districts');
                return $data;
            })
            ->make(true);
    }
}
