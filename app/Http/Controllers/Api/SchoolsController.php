<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Country;
use App\FacilityType;
use App\FacilityValue;
use App\FacilityValueSchool;
use App\Favorite;
use App\Fee;
use App\Http\Requests\SchoolRequest;
use App\School;
use App\User;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Validator;

//use Illuminate\Validation\Validator;

use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class SchoolsController extends ApiController
{
      ////////////////////////////////////////////////////
     ////////////////Get All Facilities//////////////////
    ////////////////////////////////////////////////////
    public function getFacilities()
    {
        $facilitiesArray = [];
        $facilityType = FacilityType::all();
        foreach ($facilityType as $k => $type) {
            $facilitiesArray[$k]['id'] = $type->id;
            $facilitiesArray[$k]['name'] = $type['name_' . app()->getLocale()];
            foreach ($type->facility_values as $key => $value) {
                $facilitiesArray[$k]['facilities'][$key]['id'] = $value->id;
                $facilitiesArray[$k]['facilities'][$key]['name'] = $value['name_' . app()->getLocale()];
            }
        }
        return $this->fire($facilitiesArray);
    }


      ////////////////////////////////////////////////////
     ///////////////////Get One School///////////////////
    ////////////////////////////////////////////////////
    public function getSchool(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'school_id' => 'required',
        ]);

// then, if it fails, return the error messages in JSON format
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
       /* $this->validate($request, [
            'school_id' => 'required',
        ]);*/
        $school = School::find($request->school_id);
        $schoolArray = [];
        $schoolArray['id'] = $school->id;
        $schoolArray['name'] = $school['name_'.app()->getLocale()];
        $schoolArray['logo'] = $school->logo;
        $schoolArray['email'] = null;
        if ($school->student_num) {
            $schoolArray['student_num'] = $school->student_num;
        }


        foreach ($school->school_gallery_images as $k => $image) {
            $schoolArray['images'][$k] = $image->url;
        }

        $schoolArray['fees'] = null;
        if ($school->fees) {
            foreach ($school->fees as $k => $fee) {
                $schoolArray['fees'][$k]['name'] = $fee['name_' . app()->getLocale()];
                $schoolArray['fees'][$k]['amount'] = $fee->amount;
                $schoolArray['fees'][$k]['unit'] = $fee->unit;
            }
        }
        foreach ($school->facility_value_schools as $k => $facility) {
            $value = $facility->facility_value;
            $schoolArray['facilities'][$k] = $value['name_' . app()->getLocale()];
        }
        $schoolArray['active'] = $school->active;
        $schoolArray['verified'] = $school->verified;
        $schoolArray['phone'] = $school->phone;
        $schoolArray['district_id'] = $school->district_id;
        $schoolArray['email'] = null;
        if ($school->email) {
            $schoolArray['email'] = $school->email;
        }
        $schoolArray['website'] = null;
        if ($school->website) {
            $schoolArray['website'] = $school->website;
        }
        $schoolArray['facebook'] = null;
        if ($school->facebook) {
            $schoolArray['facebook'] = $school->facebook;
        }
        $schoolArray['linkedin'] = null;
        if ($school->linkedin) {
            $schoolArray['linkedin'] = $school->linkedin;
        }
        $schoolArray['instagram'] = null;
        if ($school->instagram) {
            $schoolArray['instagram'] = $school->instagram;
        }
        $schoolArray['youtube'] = null;
        if ($school->youtube) {
            $schoolArray['youtube'] = $school->youtube;
        }
        $schoolArray['google+'] = null;
        if ($school['google+']) {
            $schoolArray['google+'] = $school['google+'];
        }
        $schoolArray['admission_url'] = null;
        if ($school['admission_url']) {
            $schoolArray['admission_url'] = $school['admission_url'];
        }
        $schoolArray['admission_date'] = null;
        if ($school['admission_date']) {
            $schoolArray['admission_date'] = $school['admission_date'];
        }
        $schoolArray['address'] = $school['address_' . app()->getLocale()];
        $schoolArray['about'] = $school['about_' . app()->getLocale()];
        $schoolArray['longitude'] = $school->longitude;
        $schoolArray['latitude'] = $school->latitude;


        return $this->fire($schoolArray);
    }

      ////////////////////////////////////////////////////
     ///////////////////Get All Schools//////////////////
    ////////////////////////////////////////////////////
    ///
    public function getAllSchool(Request $request)
    {
        $page_id = $request->page_id;
        $page_id = ($page_id-1)*10;
        $schools = School::offset($page_id)->limit(10)->get();
        $allSchoolArray = [];
        foreach ($schools as $key => $school) {
            $allSchoolArray[$key]['id'] = $school->id;
            $allSchoolArray[$key]['name'] = $school['name_' . app()->getLocale()];
            $allSchoolArray[$key]['logo'] = $school->logo;
            $allSchoolArray[$key]['student_num'] = $school->student_num;
            foreach ($school->school_gallery_images as $k => $image) {
                $allSchoolArray[$key]['images'][$k] = $image->url;
            }
            $allSchoolArray[$key]['fees'] = null;
            if ($school->fees) {
                foreach ($school->fees as $k => $fee) {
                    $allSchoolArray[$key]['fees'][$k]['name'] = $fee['name_' . app()->getLocale()];
                    $allSchoolArray[$key]['fees'][$k]['amount'] = $fee->amount;
                    $allSchoolArray[$key]['fees'][$k]['unit'] = $fee->unit;
                }
            }

            foreach ($school->facility_value_schools as $k => $facility) {
                $value = $facility->facility_value;
                $allSchoolArray[$key]['facilities'][$k] = $value['name_' . app()->getLocale()];
            }

            $allSchoolArray[$key]['active'] = $school->active;
            $allSchoolArray[$key]['verified'] = $school->verified;
            $allSchoolArray[$key]['phone'] = $school->phone;
            $allSchoolArray[$key]['district_id'] = $school->district_id;

            $allSchoolArray[$key]['website'] = null;
            if ($school->website) {
                $allSchoolArray[$key]['website'] = $school->website;
            }
            $allSchoolArray[$key]['email'] = null;
            if ($school->email) {
                $allSchoolArray[$key]['email'] = $school->email;
            }
            $allSchoolArray[$key]['facebook'] = null;
            if ($school->facebook) {
                $allSchoolArray[$key]['facebook'] = $school->facebook;
            }
            $allSchoolArray[$key]['linkedin'] = null;
            if ($school->linkedin) {
                $allSchoolArray[$key]['linkedin'] = $school->linkedin;
            }
            $allSchoolArray[$key]['instagram'] = null;
            if ($school->instagram) {
                $allSchoolArray[$key]['instagram'] = $school->instagram;
            }
            $allSchoolArray[$key]['youtube'] = null;
            if ($school->youtube) {
                $allSchoolArray[$key]['youtube'] = $school->youtube;
            }
            $allSchoolArray[$key]['google+'] = null;
            if ($school['google+']) {
                $allSchoolArray[$key]['google+'] = $school['google+'];
            }
            $allSchoolArray[$key]['admission_url'] = null;
            if ($school['admission_url']) {
                $allSchoolArray[$key]['admission_url'] = $school['admission_url'];
            }
            $allSchoolArray[$key]['admission_date'] = null;
            if ($school['admission_date']) {
                $allSchoolArray[$key]['admission_date'] = $school['admission_date'];
            }
            $allSchoolArray[$key]['address'] = $school['address_' . app()->getLocale()];
            $allSchoolArray[$key]['about'] = $school['about_' . app()->getLocale()];
            $allSchoolArray[$key]['longitude'] = $school->longitude;
            $allSchoolArray[$key]['latitude'] = $school->latitude;
        }

        return $this->fire($allSchoolArray);
    }

      ////////////////////////////////////////////////////
     /////////////////////Add School/////////////////////
    ////////////////////////////////////////////////////

    public function addSchool(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:250',
            'student_num'=>'required|max:250',
            'phone'=>'required|max:250',
            'email'=>'email|unique:schools|max:250',
            'website'=>'url',
            'facebook'=>'url|max:250','linkedin'=>'url|max:250','instagram'=>'url|max:250','youtube'=>'url|max:250','google+'=>'url|max:250',
            'admission_url'=>'url|max:250',
            'admission_date'=>'date',
            'address'=>'required',
            'about'=>'required',
            'district_id'=>'required',
//                    'facilities'=>'required'
        ]);

// then, if it fails, return the error messages in JSON format
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
          /*$this->validate($request,
                [
                    'name'=>'required|max:250',
                    'student_num'=>'required|max:250',
                    'phone'=>'required|max:250',
                    'email'=>'email|unique:schools|max:250',
                    'website'=>'url',
                    'facebook'=>'url|max:250','linkedin'=>'url|max:250','instagram'=>'url|max:250','youtube'=>'url|max:250','google+'=>'url|max:250',
                    'admission_url'=>'url|max:250',
                    'admission_date'=>'date',
                    'address'=>'required',
                    'about'=>'required',
                    'district_id'=>'required',
//                    'facilities'=>'required'
                ]);*/
        //images[],fees[],log


        $request->merge(['verified' => 0]);
        $request->merge(['active' => 0]);

        if (app()->getLocale() == "en") {
            $request->merge(['name_en' => $request->name]);
            $request->merge(['address_en' => $request->address]);
            $request->merge(['about_en' => $request->about]);
            $request->merge(['slug_en' => make_slug($request->name)]);
        } else {
            $request->merge(['name_ar' => $request->name]);
            $request->merge(['address_ar' => $request->address]);
            $request->merge(['about_ar' => $request->about]);
            $request->merge(['slug_ar' => make_slug($request->name)]);
        }
        // if ($request->has('log')) {
         //   $name='schools/logo'.str_random(60);
           // $log=(string) Image::make($request->log)->resize(128, 128)->encode('png', 75);
           // Storage::put($name,$log);
             //   $request->merge(['logo' => $name]);
        //}


        if (!$request->has('admission_date')) {
            $request->merge(['admissiamon_date' => null]);
        }

        $school = School::create($request->all());

        if (count($request->images) != null) {
            foreach ($request->images as $file) {
                $school->school_gallery_images()
                    ->create([
                        'url' => $file->store('schools/gallery')
                    ]);
            }
        }
        if ($request->has('fees')) {
            foreach ($request->fees as $fee) {
                $data = [
                    'name_' . app()->getLocale() => $fee['name'],
                    'amount' => $fee['amount'],
                    'unit' => $fee['unit'],
                ];
                $school->fees()->create($data);
            }

        }

        if ($request->facilities) {
            foreach ($request->facilities as $facility) {

                $school->facility_value_schools()->create(['facility_value_id' => $facility]);
            }
        }
        $school_id['school_id']=$school->id;

        return $this->fire($school_id, 'School is Created');

    }



    public function addLogo(Request $request)
    {
        $this->validate($request,['school_id'=>'required','logo'=>'required']);
        if($request->hasFile('logo')){
            $logo=$request->file('logo')->store('schools/logo');
            School::find($request->school_id)->update(['logo'=>$logo]);
            return $this->fire('done');
        }
        return $this->fire('fail');
    }

    public function editSchool(Request $request, School $school)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'max:250',
            'name_en' => 'max:250',
            'student_num' => 'max:250',
            'log' => 'image',
            'phone' => '',
            'email' => 'unique:schools,email,' . $school->id,
            'website' => 'url',
            'facebook' => 'url', 'linkedin' => 'url', 'instagram' => 'url', 'youtube' => 'url', 'google+' => 'url',
            'admission_url' => 'url',
            'admission_date' => 'date',
            'address_ar' => '',
            'address_en' => '',
            'about_ar' => '',
            'about_en' => '',
            'district_id' => '',
        ]);

// then, if it fails, return the error messages in JSON format
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }/*
        $this->validate($request,
            ['name_ar' => 'max:250',
                'name_en' => 'max:250',
                'student_num' => 'max:250',
                'log' => 'image',
                'phone' => '',
                'email' => 'unique:schools,email,' . $school->id,
                'website' => 'url',
                'facebook' => 'url', 'linkedin' => 'url', 'instagram' => 'url', 'youtube' => 'url', 'google+' => 'url',
                'admission_url' => 'url',
                'admission_date' => 'date',
                'address_ar' => '',
                'address_en' => '',
                'about_ar' => '',
                'about_en' => '',
                'district_id' => '',
            ]);*/


        $request->merge(['active' => 1]);
        $request->merge(['verified' => 1]);
        $request->merge(['slug_ar' => make_slug($request->name_ar)]);
        $request->merge(['slug_en' => make_slug($request->name_en)]);
        if ($request->hasFile('log')) {
            $logo = $request->file('log')->store('schools/logo');
            $request->merge(['logo' => $logo]);
        }
        if (!$request->has('admission_date')) {
            $request->merge(['admission_date' => null]);
        }

        //dd($request->all());
        return $this->fire($school->update($request->all()));


        //dd($request->images);
    }

      ////////////////////////////////////////////////////
     ///////////////////// Search ///////////////////////
    ////////////////////////////////////////////////////
    public function Search(Request $request)
    {
        $search = [];
        $schools = School::all();
        foreach ($schools as $key => $school) {
            $search[$key]['id'] = $school->id;
            $search[$key]['name'] = $school['name_' . app()->getLocale()];
            $search[$key]['logo'] = $school['logo'];
        }
        return $this->fire($search);

    }
    public function allSearch(Request $request)
    {//to search by district ,facilities and fees
       /* $request1 = json_decode($request->getContent());*/
        $validator = Validator::make($request->all(), [
            'facilities'=>'array'
        ]);
    // then, if it fails, return the error messages in JSON format
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
       //$this->validate($request,['facilities'=>'array']);

        $schools = new School();
         $requestCount=$request->all();
        if(count($requestCount)!=0) {
            $district = $request->district_id;
            if ($district != 0) {
                $schools = $schools->where("district_id", $request->district_id);
            }
            if ($request->has('facilities') && is_array($request->facilities)) {
                $facilities = $request['facilities'];
                $schools = $schools->whereHas('facility_value_schools', function ($query) use ($facilities) {
                    $query->whereIn('facility_value_id', $facilities);
                });
            }
            $rangeOne = $request->rangFrom;
            $rangeTwo = $request->rangTo;
            if (!$rangeTwo == 0) {
                $schools = $schools->whereHas('fees', function ($query) use ($rangeOne, $rangeTwo) {
                    $query->whereBetween('amount', [$rangeOne, $rangeTwo]);
                });
            }
            $schools = $schools->get();
            if (count($schools) == 0) {
                return $this->fire('No Result');
            }
            $schoolsArray=[];
            foreach ($schools as $key=>$school){
                $schoolsArray[$key]['id']=$school->id;
                $schoolsArray[$key]['logo']=$school->logo;
                $schoolsArray[$key]['name']=$school['name_'.app()->getLocale()];
                $schoolsArray[$key]['about']=$school['about_'.app()->getLocale()];
            }
            return $this->fire($schoolsArray);
        }else{
            return $this->fire('No Search keywords Entered');
        }
    }




}

