<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\Country;
use App\SeoCities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class CitiesController extends Controller
{
    /* Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cities.index');
    }

    /*Show the form for creating a new resource.
     */
    public function create()
    {
        $countries=Country::pluck('name_en','id');
        return view('admin.cities.create',compact('countries'));
    }

    /* Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name_ar'=>'required|arabic_only',
           'name_en'=>'required|english_only'
        ]);
        $request->merge(['slug_ar'=>make_slug($request->name_ar)]);
        $request->merge(['slug_en'=>make_slug($request->name_en)]);
        City::create($request->all());

        return redirect('lead/cities');

    }

    /* Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /*Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $countries=Country::pluck('name_en','id');
        return view('admin.cities.edit',compact('city','countries'));
    }

    /* Update the specified resource in storage.
     */
    /*Remove the specified resource from storage.
     */



    public function update(Request $request, City $city)
    {
        $this->validate($request, [
            'name_ar' => 'required|arabic_only',
            'name_en' => 'required|english_only'
        ]);
        $request->merge(['slug_ar' => make_slug($request->name_ar)]);
        $request->merge(['slug_en' => make_slug($request->name_en)]);
        $city->update($request->all());
        return redirect('/lead/cities');
    }

    /*Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return back();
    }

    /*to display datatables
     */
    public function datatable()
    {
        $cities=City::all();

        return DataTables::of($cities)
            ->editColumn('country_id',function ($model){
                $data=$model->country->name_en;
                return $data;
            })
            ->editColumn('control',function ($model){
           $data=renderOptions($model,'CitiesController','cities');
           return $data;
        })
        ->make(true);
    }
}
