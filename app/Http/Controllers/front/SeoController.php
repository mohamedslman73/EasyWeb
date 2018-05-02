<?php

namespace App\Http\Controllers\front;

use App;
use App\City;
use App\School;
use App\SeoLink;
use App\District;
use App\SiteSeoOption;
use App\FacilityValue;
use Illuminate\Http\Request;
use App\FacilityValueSchool;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SeoController extends Controller
{
  public function createLinks(Request $request){
    if($request->password != 'easyschools2050')
    {
      return 'invalid request';
    }

    $cities     = City::all();
    $districts  = District::all();
    $facilities = FacilityValue::all();

    // Create Link for each City - Lang = en
    foreach ($cities as $city) {
      $link = new SeoLink();
      $link->url                = strtolower("schools-in-". str_replace(' ', '-', $city->name_en).'-english');
      $link->slug               = "Schools-in-". str_replace(' ', '-', $city->name_en);
      $link->title              = "Schools in ". $city->name_en;
      $link->lang               = "en";
      $link->city_id            = $city->id;
      $link->district_id        = NULL;
      $link->facility_value_id  = NULL;
      if($this->linkHasSchools($link))
      {
          $link->save();
      }
      //Create Link for each Facility in each City - Lang = en
      foreach ($facilities as $facility) {
        $cityName     = str_replace(' ', '-', $city->name_en);
        $facilityName = str_replace(' ', '-', $facility->name_en);

        $link = new SeoLink();
        $link->url                = strtolower("schools-in-". $cityName. "-with-". $facilityName. '-english');
        $link->slug               = "Schools-in-". $cityName. "-with-". $facilityName;
        $link->title              = "Schools in ". $city->name_en. " with ". $facility->name_en;
        $link->lang               = "en";
        $link->city_id            = $city->id;
        $link->district_id        = NULL;
        $link->facility_value_id  = $facility->id;
        if($this->linkHasSchools($link))
        {
            $link->save();
        }
      }
    }

    //Create Link for each District - Lang = en
    foreach ($districts as $district) {
      $link = new SeoLink();
      $link->url                = strtolower("schools-in-". str_replace(' ', '-', $district->name_en). '-english');
      $link->slug               = "Schools-in-". str_replace(' ', '-', $district->name_en);
      $link->title              = "Schools in ". $district->name_en;
      $link->lang               = "en";
      $link->city_id            = NULL;
      $link->district_id        = $district->id;
      $link->facility_value_id  = NULL;
      if($this->linkHasSchools($link))
      {
          $link->save();
      }
      //Create Link for each Facility in each District - Lang = en
      foreach ($facilities as $facility) {
        $districtName = str_replace(' ', '-', $district->name_en);
        $facilityName = str_replace(' ', '-', $facility->name_en);

        $link = new SeoLink();
        $link->url                = strtolower("schools-in-". $districtName. "-with-". $facilityName. '-english');
        $link->slug               = "Schools-in-". $districtName. "-with-". $facilityName;
        $link->title              = "Schools in ". $district->name_en. " with ". $facility->name_en;
        $link->lang               = "en";
        $link->city_id            = NULL;
        $link->district_id        = $district->id;
        $link->facility_value_id  = $facility->id;
        if($this->linkHasSchools($link))
        {
            $link->save();
        }
      }
    }

    //Create Link for each Facility - Lang = en
    foreach ($facilities as $facility) {
      $link = new SeoLink();
      $link->url                = strtolower("schools-with-". str_replace(' ', '-', $facility->name_en). '-english');
      $link->slug               = "Schools-with-". str_replace(' ', '-', $facility->name_en);
      $link->title              = "Schools with ". $facility->name_en;
      $link->lang               = "en";
      $link->city_id            = NULL;
      $link->district_id        = NULL;
      $link->facility_value_id  = $facility->id;
      if($this->linkHasSchools($link))
      {
          $link->save();
      }
    }

    // Create Link for each City - Lang = ar
    foreach ($cities as $city) {
      $link = new SeoLink();
      $link->url                = strtolower("schools-in-". str_replace(' ', '-', $city->name_en). "-arabic");
      $link->slug               = "مدارس-في-". str_replace(' ', '-', $city->name_ar);
      $link->title              = "مدارس في ". $city->name_ar;
      $link->lang               = "ar";
      $link->city_id            = $city->id;
      $link->district_id        = NULL;
      $link->facility_value_id  = NULL;
      if($this->linkHasSchools($link))
      {
          $link->save();
      }

      //Create Link for each Facility in each City - Lang = ar
      foreach ($facilities as $facility) {
        $cityNameAr     = str_replace(' ', '-', $city->name_ar);
        $facilityNameAr = str_replace(' ', '-', $facility->name_ar);

        $cityNameEn     = str_replace(' ', '-', $city->name_en);
        $facilityNameEn = str_replace(' ', '-', $facility->name_en);

        $link = new SeoLink();
        $link->url                = strtolower("schools-in-". $cityNameEn. "-with-". $facilityNameEn. "-arabic");
        $link->slug               = "مدارس-في-". $cityNameAr. "-فيها-". $facilityNameAr;
        $link->title              = "مدارس في ". $city->name_ar. " فيها ". $facility->name_ar;
        $link->lang               = "ar";
        $link->city_id            = $city->id;
        $link->district_id        = NULL;
        $link->facility_value_id  = $facility->id;
        if($this->linkHasSchools($link))
        {
            $link->save();
        }
      }
    }

    //Create Link for each District - Lang = ar
    foreach ($districts as $district) {
      $link = new SeoLink();
      $link->url                = strtolower("schools-in-". str_replace(' ', '-', $district->name_en). "-arabic");
      $link->slug               = "مدارس-في-". str_replace(' ', '-', $district->name_ar);
      $link->title              = "مدارس في ". $district->name_ar;
      $link->lang               = "ar";
      $link->city_id            = NULL;
      $link->district_id        = $district->id;
      $link->facility_value_id  = NULL;
      if($this->linkHasSchools($link))
      {
          $link->save();
      }

      //Create Link for each Facility in each District - Lang = ar
      foreach ($facilities as $facility) {
        $districtNameAr = str_replace(' ', '-', $district->name_ar);
        $facilityNameAr = str_replace(' ', '-', $facility->name_ar);

        $districtNameEn = str_replace(' ', '-', $district->name_en);
        $facilityNameEn = str_replace(' ', '-', $facility->name_en);

        $link = new SeoLink();
        $link->url                = strtolower("schools-in-". $districtNameEn. "-with-". $facilityNameEn."-arabic");
        $link->slug               = "مدارس-في-". $districtNameAr. "-فيها-". $facilityNameAr;
        $link->title              = "مدارس في ". $district->name_ar. " فيها ". $facility->name_ar;
        $link->lang               = "ar";
        $link->city_id            = NULL;
        $link->district_id        = $district->id;
        $link->facility_value_id  = $facility->id;
        if($this->linkHasSchools($link))
        {
            $link->save();
        }
      }
    }

    //Create Link for each Facility - Lang = ar
    foreach ($facilities as $facility) {
      $link = new SeoLink();
      $link->url                = strtolower("schools-with-". str_replace(' ', '-', $facility->name_en)."-arabic");
      $link->slug               = "مدارس-فيها-". str_replace(' ', '-', $facility->name_ar);
      $link->title              = "مدارس فيها ". $facility->name_ar;
      $link->lang               = "ar";
      $link->city_id            = NULL;
      $link->district_id        = NULL;
      $link->facility_value_id  = $facility->id;
      if($this->linkHasSchools($link))
      {
          $link->save();
      }
    }

    return 'Done';
  }


  public function linkHasSchools(SeoLink $link)
  {
    $districts = array();

    $facilityID = $link->facility_value_id;

    if($link->district_id && $link->city_id == NULL){
      $districts[] = $link->district_id;
    }elseif($link->city_id && $link->district_id == NULL) {
      $districtCollections = City::find($link->city_id)->districts()->get();
      foreach ($districtCollections as $district) { $districts[] = $district->id; }
    }

    if($link->district_id || $link->city_id && $link->facility_value_id == NULL){
      // Get Schools in City or Districts
      $schools = School::whereIn('district_id', $districts)->paginate(9);
    }

    if($link->facility_value_id && $link->district_id == NULL && $link->city_id == NULL){
      // Get Schools with particular facility
      $schools = FacilityValueSchool::select('schools.*')
      ->join('schools', 'facility_value_schools.school_id', '=', 'schools.id')
      ->where('facility_value_schools.facility_value_id', $facilityID)
      ->paginate(9);
    }

    if($link->district_id || $link->city_id && $link->facility_value_id != NULL){
      // Get Schools with particular facility
      $schools = FacilityValueSchool::select('schools.*')
      ->join('schools', 'facility_value_schools.school_id', '=', 'schools.id')
      ->where('facility_value_schools.facility_value_id', $facilityID)
      ->whereIn('district_id', $districts)
      ->paginate(9);
    }

    if($schools->count() == 0)
    {
      return false;
    }else {
      return true;
    }
  }



  public function getSchools($url){
    $link = SeoLink::where('url','LIKE', '%'.$url.'%')->first();
    $districts = array();

    $facilityID = $link->facility_value_id;

    if($link->district_id && $link->city_id == NULL){
      $districts[] = $link->district_id;
    }elseif($link->city_id && $link->district_id == NULL) {
      $districtCollections = City::find($link->city_id)->districts()->get();
      foreach ($districtCollections as $district) { $districts[] = $district->id; }
    }

    if($link->district_id || $link->city_id && $link->facility_value_id == NULL){
      // Get Schools in City or Districts
      $schools = School::whereIn('district_id', $districts)->paginate(9);
    }

    if($link->facility_value_id && $link->district_id == NULL && $link->city_id == NULL){
      // Get Schools with particular facility
      $schools = FacilityValueSchool::select('schools.*')
      ->join('schools', 'facility_value_schools.school_id', '=', 'schools.id')
      ->where('facility_value_schools.facility_value_id', $facilityID)
      ->paginate(9);
    }

    if($link->district_id || $link->city_id && $link->facility_value_id != NULL){
      // Get Schools with particular facility
      $schools = FacilityValueSchool::select('schools.*')
      ->join('schools', 'facility_value_schools.school_id', '=', 'schools.id')
      ->where('facility_value_schools.facility_value_id', $facilityID)
      ->whereIn('district_id', $districts)
      ->paginate(9);
    }
    if(count($schools) == 0){
      session()->flash('massage', 'No Result');
    }

      for($i=0; $i<count($schools); $i++){
          $logo=$schools[$i]->logo;
          /*$str=strstr($logo,'https://www.easyschools.org/uploads/');
             dd($logo);
             if($str){
                    $strReplace=str_replace('https://www.easyschools.org/uploads/','',$str);
                    $schools[$i]->logo =$strReplace;
             }else{
                 $schools[$i]->logo =asset("uploads/".$schools[$i]->logo);
             }*/
      }
      $seo=SiteSeoOption::where('title','city_and_district')->first();
      return view('website.schools.schools', compact('schools','seo'));
  }


  public function getAllLinks(){
    $lang    = App::getLocale() ? App::getLocale() : "en";
    $links   = SeoLink::where('lang', $lang)->get();
    $schools = School::all();
    return view('website.seoLinks', compact('links', 'schools'));
  }

}
