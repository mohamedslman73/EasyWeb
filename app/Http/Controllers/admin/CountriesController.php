<?php

namespace App\Http\Controllers\admin;

use App\Country;
use App\SeoCountries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;


class CountriesController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        return View('admin.countries.index');
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.countries.create');
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_ar'=>'required|arabic_only',
            'name_en'=>'required|english_only',
        ]);
        $request->merge(["slug_ar"=>make_slug($request->name_ar)]);
        $request->merge(["slug_en"=>make_slug($request->name_en)]);
        Country::create($request->all());

        return redirect('/lead/countries');
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
    public function edit(Country $country)
    {
        return view('admin.countries.edit',compact('country'));
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request,Country $country)
    {
       $this->validate($request,[
            'name_ar'=>'required|arabic_only',
            'name_en'=>'required|English_only',
        ]);

        $request->merge(["slug_ar"=>make_slug($request->name_ar)]);
        $request->merge(["slug_en"=>make_slug($request->name_en)]);
        $country->update($request->all());
        return redirect('/lead/countries');
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return back();
    }

    public function datatable()
    {
        $countries=Country::all();
        return Datatables::of($countries)->editColumn('control',function ($model){
            $data = renderOptions($model,"CountriesController","countries");
            return $data;
        })
        ->make(true);
    }
}
