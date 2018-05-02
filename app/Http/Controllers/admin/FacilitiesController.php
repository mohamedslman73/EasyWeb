<?php

namespace App\Http\Controllers\admin;

use App\FacilityType;
use App\FacilityValue;
use App\SeoFacilities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;


class FacilitiesController extends Controller
{
    /* Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.facilities.index');
    }

    /* Show the form for creating a new resource.
    */
    public function create()
    {
        $facilityType=FacilityType::pluck('name_en','id');
        return view('admin.facilities.create',compact('facilityValue','facilityType'));

    }

    /* Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_ar'=>'required|arabic_only',
            'name_en'=>'required|english_only'
        ]);

        $request->merge(['status'=>1]);
         FacilityValue::create($request->all());
        return redirect('lead/facilities');


    }

    /*Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /* Show the form for editing the specified resource.
     */
    public function edit(FacilityValue $facility)
    {
        $facilityType=FacilityType::pluck('name_en','id');
        return view('admin.facilities.edit',compact('facility','facilityType'));
    }

    /* Update the specified resource in storage.
     */
    public function update(Request $request,FacilityValue $facility)
    {
        $this->validate($request,[
            'name_ar'=>'required|arabic_only',
            'name_en'=>'required|english_only'
        ]);

        $request->merge(['status'=>1]);
        $facility->update($request->all());
        return redirect('lead/facilities');
    }

    /* Remove the specified resource from storage.
     */
    public function destroy(FacilityValue $facility)
    {
        $facility->delete();
        return back();
    }


    //status
    public function status(FacilityValue $facilityValue)
    {
        if($facilityValue->status ==0){
            $facilityValue->update(['status'=>1]);
        }else{
            $facilityValue->update(['status'=>0]);
        }
        return back();
    }

    //display datatables
    public function datatable()
    {
        $facility_value=FacilityValue::all();

        return DataTables::of($facility_value)
            //facility type button
            ->editColumn('facility_type_id',function ($model){
                $data=$model->facility_type->name_en;
                return $data;
            })
            //status button
            ->editColumn('status',function ($model){
                $data=renderAction($model,'FacilitiesController','status',$model->status);
                return $data;
            })
            //edit & delete
            ->editColumn('control',function ($model){
                $data=renderOptions($model,'FacilitiesController','facilities');
                return $data;
            })
            ->make(true);
    }
}
