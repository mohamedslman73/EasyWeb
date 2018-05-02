<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\Country;
use App\EditRequests;
use App\SeoSchools;
use App\District;
use App\FacilityType;
use App\FacilityValue;
use App\FacilityValueSchool;
use App\Fee;
use App\School;
use App\SchoolGalleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;


class SchoolsController extends Controller
{
    /* Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.schools.index');
    }

    /* Show the form for creating a new resource.
     */
    public function create()
    {
        $facilitiesTypes=FacilityType::get();
        return view('admin.schools.create',compact('facilitiesTypes'));
    }

    /* Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name_ar'=>'required|max:250',
                'name_en'=>'required|max:250',
                'student_num'=>'required|max:250',
                'log'=>'required|image',
                'phone'=>'required|max:250',
                'email'=>'email|unique:schools|max:250',
                'website'=>'url',
               // 'facebook'=>'url','linkedin'=>'url','instagram'=>'url','youtube'=>'url','googleplus'=>'url',
                //'admission_url'=>'url',
               // 'admission_date'=>'date',
                'address_ar'=>'required',
                'address_en'=>'required',
                'about_ar'=>'required',
                'about_en'=>'required',
                'district_id'=>'required',
                'facilities'=>'required'
            ]);

        $request->merge(['active'=>1]);
        $request->merge(['verified'=>1]);
        $request->merge(['slug_ar'=>make_slug($request->name_ar)]);
        $request->merge(['slug_en'=>make_slug($request->name_en)]);
        if($request->hasFile('log')){
            $logo=$request->file('log')->store('schools/logo');
            $request->merge(['logo'=>$logo]);
        }
        if(!$request->has('admission_date')){
            $request->merge(['admission_date'=>null]);
        }

        $school=School::create($request->all());

        if(count($request->images) != null){
            foreach ($request->images as $image) {
                $school->school_gallery_images()->create(['url' => $image->store('schools/gallery')]);
            }
        }
        if($request->has('fees')) {
            foreach ($request->fees as $certificates => $educationLevels) {
                foreach ($educationLevels as $educationLevel => $values) {
                    $data = [
                        'name_ar' => loadFacility($certificates)->name_ar . " " . loadFacility($educationLevel)->name_ar,
                        'name_en' => loadFacility($certificates)->name_en . " " . loadFacility($educationLevel)->name_en,
                        'amount' => $values['cost'],
                        'unit' => $values['currecy'],
                    ];
                    $school->fees()->create($data);
                }
            }
        }
        if($request->facilities){
            foreach ($request->facilities as $facility){

                $school->facility_value_schools()->create(['facility_value_id'=>$facility]);
            }
        }
        return redirect(url('lead/schools'));
    }

    /* Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /*Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        $schoolDistrict         = District::find($school->district_id);
        $districts              = array_merge(['selected'=>$schoolDistrict->id],['data'=>District::where('city_id',$schoolDistrict->city_id)->pluck('name_en','id')->toArray()]);
        $schoolCity             = City::find($schoolDistrict->city_id);
        $cities                 = array_merge(['selected'=>$schoolDistrict->city_id],['data'=>City::where('country_id',$schoolCity->country_id)->pluck('name_en','id')->toArray()]);
        $selectedCountry        = $schoolCity->country_id;
        $countries              = array_merge(['selected'=>$selectedCountry],['data'=>Country::pluck('name_en','id')->toArray()]);
        $facilitiesTypes        = FacilityType::get();
        $facilitiesValueSchool  = $school->facility_value_schools->pluck('facility_value_id')->toArray();
        return view('admin.schools.edit',compact('countries','districts','cities','school','facilitiesTypes','facilitiesValueSchool'));
    }

    /* Update the specified resource in storage.
     */
    public function update(Request $request,School $school)
    {
        $this->validate($request,
            ['name_ar'=>'required|max:250',
                'name_en'=>'required|max:250',
                'student_num'=>'required|max:250',
                'log'=>'image',
                'phone'=>'required',
                'email'=>'unique:schools,email,'.$school->id,
                'website'=>'url',
               // 'facebook'=>'url','linkedin'=>'url','instagram'=>'url','youtube'=>'url','googleplus'=>'url',
              //  'admission_url'=>'url',
            //    'admission_date'=>'date',
                'address_ar'=>'required',
                'address_en'=>'required',
                'about_ar'=>'required',
                'about_en'=>'required',
                'district_id'=>'required',
                'facilities'=>'required']);


        $request->merge(['active'=>1]);
        $request->merge(['verified'=>1]);
        $request->merge(['slug_ar'=>make_slug($request->name_ar)]);
        $request->merge(['slug_en'=>make_slug($request->name_en)]);

        if($request->hasFile('log')){
            $logo=$request->file('log')->store('schools/logo');
            $request->merge(['logo'=>$logo]);
        }

        if(!$request->has('admission_date')){
            $request->merge(['admission_date'=>null]);
        }

        $school->update($request->all());
        /*dd($request->images);*/

        if(count($request->images) != null){
            foreach ($request->images as $image) {
                $school->school_gallery_images()->create(['url' => $image->store('schools/gallery')]);
            }
        }
        if($request->has('updateFees')){
            foreach ($request->updateFees as $fee_id => $values){
                Fee::find($fee_id)->update($values);
            }
        }else{
            Fee::where('school_id',$school->id)->delete();
        }

        if($request->has('fees')) {
            foreach ($request->fees as $certificates => $educationLevels) {
                foreach ($educationLevels as $educationLevel => $values) {
                    $data = [
                        'name_ar' => loadFacility($certificates)->name_ar . " " . loadFacility($educationLevel)->name_ar,
                        'name_en' => loadFacility($certificates)->name_en . " " . loadFacility($educationLevel)->name_en,
                        'amount' => $values['cost'],
                        'unit' => $values['currecy'],
                    ];
                    $school->fees()->create($data);
                }
            }
        }

        FacilityValueSchool::where('school_id',$school->id)->delete();
        if($request->has('facilities')){
            foreach ($request->facilities as $facility){
                $school->facility_value_schools()->create(['facility_value_id'=>$facility]);
            }
        }
        return redirect(url('lead/schools'));
    }

    /* Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $school->delete();
        return back();
    }
    //activation
    public function activate(School $school)
    {
        if($school->active ==0) {
            $school->update(['active' => 1]);
        }else{
            $school->update(['active' => 0]);
        }
        return back();
    }
    //verified
    public function verify(School $school)
    {
        if($school->verified ==0)
        {
            $school->update(['verified'=>1]);
        }else{
            $school->update(['verified'=>0]);
        }
        return back();
    }

    public function showSchool(School $school)
    {
        if($school->show ==0)
        {
            $school->update(['show' => 1]);
        }else{
            $school->update(['show'=>0]);
        }
        return back();
    }

    public function deleteImage(SchoolGalleryImage $image)
    {
        $image->delete();
        return back();
    }

    //display datatables
    public function datatable()
    {
        $schools=School::all();

        return DataTables::of($schools)
            ->editColumn('district_id',function ($model){

                $data=$model->district->name_en;
                return $data;
            })
            ->editColumn('show',function ($model){
                $data=renderAction($model,'SchoolsController','showSchool',$model->show);
                return $data;
            })
            ->editColumn('active',function ($model){
                $data=renderAction($model,'SchoolsController','activate',$model->active);
                return $data;
            })
            ->editColumn('verified',function ($model){
                $data=renderAction($model,'SchoolsController','verify',$model->verified);
                return $data;
            })

            ->editColumn('control',function ($model){
                $data=renderOptions($model,'SchoolsController','schools');
                return $data;
            })
            ->make(true);
    }

    public function regionsJson()
    {
        return Country::with(['cities'=>function($cities){
            $cities->with(['districts']);
        }])->get()->toArray();
    }

   /* public function addSchool(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required|max:250',
                'student_num'=>'required|max:250',
                'log'=>'required',
                'phone'=>'required|max:250',
                'email'=>'email|unique:schools|max:250',
                'website'=>'url',
                'facebook'=>'url|max:250','linkedin'=>'url|max:250','instagram'=>'url|max:250','youtube'=>'url|max:250','google+'=>'url|max:250',
                'admission_url'=>'url|max:250',
                'admission_date'=>'date',
                'address'=>'required',
                'about'=>'required',
                'district_id'=>'required',
                'facilities'=>'required'
            ]);
        //images[],fees[]
        $request->merge(['active'=>0]);
        $request->merge(['verified'=>0]);

        if(app()->getLocale()=="en"){
            $request->merge(['name_en'=>$request->name]);
            $request->merge(['address_en'=>$request->address]);
            $request->merge(['about_en'=>$request->about]);
            $request->merge(['slug_en'=>make_slug($request->name)]);
        }else{
            $request->merge(['name_ar'=>$request->name]);
            $request->merge(['address_ar'=>$request->address]);
            $request->merge(['about_ar'=>$request->about]);
            $request->merge(['slug_ar'=>make_slug($request->name)]);
        }


        if($request->hasFile('log')){
            $logo=$request->file('log')->store('schools/logo');
            $request->merge(['logo'=>$logo]);
        }

        if(!$request->has('admission_date')){
            $request->merge(['admission_date'=>null]);
        }

        $school=School::create($request->all());

        if(count($request->images) != null){
            foreach ($request->images as $image) {
                $school->school_gallery_images()->create(['url' => $image->store('schools/gallery')]);
            }
        }
        if($request->has('fees')) {
            foreach ($request->fees as $fee) {
                $data = [
                    'name_'.app()->getLocale() =>$fee['name'] ,
                    'amount' => $fee['amount'],
                    'unit' => $fee['unit'],
                ];
                $school->fees()->create($data);
            }

        }
        if($request->facilities){
            foreach ($request->facilities as $facility){

                $school->facility_value_schools()->create(['facility_value_id'=>$facility]);
            }
        }

    }*/

}
