<?php

namespace App\Http\Controllers\front;

use Alert;
use App\Article;
use App\SiteSeoOption;
use Validator;
use App\City;
use App\Country;
use App\District;
use App\Replay;
use App\FacilityType;
use App\FacilityValue;
use App\FacilityValueSchool;
use App\Fee;
use App\Content;
use App\School;
use App\Comment;
use App\FixedImage;
use App\EditRequests;
use App\SchoolGalleryImage;
use App\SeoSchools;
use App\SchoolRate;
use App\SiteSeoOptions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\HelperController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SchoolController extends Controller
{



    /////////////////////////////////////////////////////
    //////////////// Get All Schools ////////////////////
    /////////////////////////////////////////////////////

    public function getAllSchools()
    {//to display all schools to allschools page
        $schools = School::select('id', 'slug_en', 'slug_ar', 'logo', 'about_' . app()->getLocale(), 'name_' . app()->getLocale())->paginate(9);
        return view('website.schools.schools', compact('schools'));
    }

    /////////////////////////////////////////////////////
    ////////////////////// Search ///////////////////////
    /////////////////////////////////////////////////////
    public function searchAuto(Request $request)
    {
        if($request->search=='') {
            return Response('');

        }
        if($request->ajax()){
            $output="";
            $schools=School::where('name_'.app()->getLocale(),'LIKE','%'.$request->search."%")->limit(10)->get();
            if($schools){
                foreach ($schools as $key => $school) {
                    $output.='<li class="data" ourValue="'.$school['name_'.app()->getLocale()].'">'.$school['name_'.app()->getLocale()].'</li>'.
                        /*                                '<td>'.$school->district().'</td>'.*/
                        '</li>';
                }
                return Response($output);
            }
        }
    }
    public function search(Request $request)
    {//to search by school name

        $searchKey      =$request->search;
        $city           =City::where('name_ar', 'LIKE', '%'.$searchKey.'%')->orWhere('name_en', 'LIKE', '%'.$searchKey.'%')->with('districts')->first();

        if ($city!=null) {
            $districts      =$city->districts->pluck('id');
            $schools        =School::select('id', 'name_'.app()->getLocale(), 'logo', 'about_'.app()->getLocale(), 'slug_en')
                                ->whereIn('district_id', $districts)->paginate(12);
            //to keep search key
            $schools->withPath('?search='.$searchKey);
            //check if schools if have values
            if (count($schools) == 0) {
                $schools->withPath('?search='.$searchKey);
                return redirect()->back()->with('message', 'sorry no result');
            }
            //return view with name of city
            $cityName=$city->name_en;
            $seo=SiteSeoOption::where('title','city_and_district')->first();
            return view('website.schools.displaySearchedSchools', compact('schools', 'cityName','seo'));
        }
        //
        if ($searchKey!=null) {
            $schools = School::where('name_' . app()->getLocale(), 'LIKE', '%' . $searchKey . '%')
            ->orderBy('name_' . app()->getLocale(), 'asc')->paginate(12);
            $schools->withPath('search?'.'search='.$searchKey);

            if (count($schools) == 0) {
                return redirect()->back()->with('message', 'sorry no result');
            }
            $seo=SiteSeoOption::where('title','city_and_district')->first();
            return view('website.schools.displaySearchedSchools', compact('schools','seo'));
        }
    }
    ////////////////////// return districts of city///////////////////////
    public function returnDistrict(Request $request)
    {//to display districts
        $id=City::select('id')->where('slug_'.app()->getLocale(), $request->slug)->first()->id;

        $districts = District::where('city_id', $id)->get();
        return view('website.schools.returndistrict', compact('districts'));
    }

    ////////////////////// advanced search ///////////////////////

    public function advSearch(Request $request)
    {//to search by district ,facilities and fees
        /*dd($request->all());*/
        $school = new School();
        $district = $request->district;
        $message='';
        /*        $schools='';*/
        if (count($district) !=0) {
            if ($district == -1) {
                $city=City::where('slug_'.app()->getLocale(), $request->city)->first()->id;
                $allDistricts=District::where('city_id', $city)->get(['id']);
                $schools = $school->whereIn("district_id", $allDistricts);
            } else {
                $district=District::where('slug_'.app()->getLocale(), $district)->first()->id;
                $query=$school->orWhere("district_id", $district);

                if (count($query->get())!=0) {
                    $schools=$query;
                } else {
                    $message="this district don't have schools, we suggest this schools with same facilities and same range";
                    $city=City::where('slug_'.app()->getLocale(), $request->city)->first()->id;
                    $allDistricts=District::where('city_id', $city)->get(['id']);
                    $schools = $school->whereIn("district_id", $allDistricts);
                }
            }
        }

        $facilities=$request->facilities;
        if ($request->has('facilities')) {
            $schools = $schools->orWhereHas('facility_value_schools', function ($query) use ($facilities) {
                $query->whereNotIn('facility_value_id', $facilities);
            });
        }
        $rangeTwo = (int)$request->rangeTwo;
        $rangeOne = $request->rangeOne;
        if (!$rangeTwo == 1) {
            $schools= $schools->orWhereHas('fees', function ($query) use ($rangeOne, $rangeTwo) {
                $query->whereBetween('amount', [$rangeOne, $rangeTwo]);
            });
        }

        /*        dd($schools->get());*/
        $schools = $schools->paginate(9);
        $schools->withPath('advsearch?'.'city='.$request->city.'&district='.$request->district.'&rangeOne='.$request->rangeOne.'&rangeTwo='.$request->rangeTwo);
        if (count($schools) == 0) {
            session()->flash('massage', 'No Result');
            return back();
        }
        $seo=SiteSeoOption::where('title','city_and_district')->first();
        return view('website.schools.displaySearchedSchools', compact('schools', 'message','seo'));
    }
    /////////////////////////////////////////////////////
    ////////////////////// sort by city /////////////////
    /////////////////////////////////////////////////////

    public function getSchoolsCity($lang, $cityName)
    {
        $city = City::where('name_' . $lang, 'LIKE', '%' . $cityName . '%')->with('districts')->first();
        $districts = $city->districts->pluck('id');
        $schools = School::select('id', 'name_' . $lang, 'logo', 'about_' . $lang, 'slug_' . $lang)
            ->whereIn('district_id', $districts)->paginate(12);
        $schools->withPath('?search=' . $city['name_' . $lang]);
        if (count($schools) == 0) {
            session()->flash('massage', 'No Result');
            return back();
        }
        $seo=SiteSeoOption::where('title','city_and_district')->first();
        return view('website.schools.displaySearchedSchools', compact('schools', 'seo','cityName'));
    }
    /////////////////////////////////////////////////////
    ////////////////////// sort by District /////////////////
    /////////////////////////////////////////////////////

    public function getSchoolsDistrict($lang, $districtName)
    {
        $district           =District::where('slug_'.$lang, 'LIKE', '%'.$districtName.'%')->first();
        // $districts      =$city->districts->pluck('id');
        $schools        =School::select('id', 'name_'.$lang, 'logo', 'about_'.$lang, 'slug_'.$lang)
            ->where('district_id', $district->id)->paginate(12);
        $schools->withPath('?search='.$district['slug_'.$lang]);
        if (count($schools) == 0) {
            session()->flash('massage', 'No Result');
            return back();
        }
        $cityName=$districtName;
        $seo=SiteSeoOption::where('title','city_and_district')->first();
        return view('website.schools.displaySearchedSchools', compact('schools','seo','cityName'));
    }
    /////////////////////////////////////////////////////
    //////////////// Get All Schools ////////////////////
    /////////////////////////////////////////////////////

     /* public function displaySchoolFacilities($lang,$slug)
      { dd($slug);
          $schools=FacilityValue::where('name_'.app()->getLocale(),$facility_name)->with('school')->first();
          if($schools!=null){
              $schools->school()->paginate(12);
          }

          return view('website.schools.displaySchoolFacilities',compact('schools','facility_name'));
      }*/
    /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////
    //////////////////////End Amir //////////////////////
    /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////

    public function singlePage($lang, $slug)
    {
        $articles = Article::limit(4)->get();
        $schools = School::where('slug_ar', '=', $slug)->orwhere('slug_en', '=', $slug)->first();
        $seo = SiteSeoOption::where('title','schools')->first();
        $similarSchools = $this->similarSchools($schools);
        $city=$schools->district()->first()->city()->first()['name_'.app()->getLocale()];
        $facilitiesArr = array();
        $facilities = $schools->facilities;
        foreach ($facilities as $facility) {
          $facilitiesArr[ $facility->facility_type['name_'.app()->getLocale()] ][] = $facility['name_'.app()->getLocale()];
        }
         // return $facilitiesArr;
        return view('website.schools.schoolProfile', [
          'schools'    => $schools,
          'seo'        => $seo,
          'similars'   => $similarSchools,
          'articles'   => $articles,
          'city'       => $city,
          'facilities' => $facilitiesArr
        ]);
    }

    public function similarSchools($school)
    {
        $district_IDs = array();
        $similarSchools = School::where('district_id', $school->district_id)->where('id', '!=', $school->id)->limit(6)->get();
        if ($similarSchools->count() == 0) {
            $city = District::find($school->district_id)->city->id;
            $districts_in_city = District::where('city_id', $city)->get();
            foreach ($districts_in_city as $district) {
                $district_IDs[] = $district->id;
            }
            $similarSchools = School::whereIn('district_id', $district_IDs)->limit(6)->get();
        }
        return $similarSchools;
    }


    /*
     * Show the form for creating a new resource.


    /* Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name_ar' => 'required|max:250',
                'name_en' => 'required|max:250',
                'student_num' => 'required|max:250',
                'log' => 'required|image',
                'phone' => 'required|max:250',
                'email' => 'email|unique:schools|max:250',
                'website' => 'url',
                'facebook' => 'url|max:250', 'linkedin' => 'url|max:250', 'instagram' => 'url|max:250', 'youtube' => 'url|max:250', 'google+' => 'url|max:250',
                'admission_url' => 'url|max:250',
                'admission_date' => 'date',
                'address_ar' => 'required',
                'address_en' => 'required',
                'about_ar' => 'required',
                'about_en' => 'required',
                'district_id' => 'required',
                'facilities' => 'required'
            ]
        );

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

        $school = School::create($request->all());

        if (count($request->images) != null) {
            foreach ($request->images as $image) {
                $school->school_gallery_images()->create(['url' => $image->store('schools/gallery')]);
            }
        }
        if ($request->has('fees')) {
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
        if ($request->facilities) {
            foreach ($request->facilities as $facility) {
                $school->facility_value_schools()->create(['facility_value_id' => $facility]);
            }
        }



        return redirect(url('admin/schools'));
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
        $schoolDistrict = District::find($school->district_id);
        $districts = array_merge(['selected' => $schoolDistrict->id], ['data' => District::where('city_id', $schoolDistrict->city_id)->pluck('name_en', 'id')->toArray()]);
        $schoolCity = City::find($schoolDistrict->city_id);
        $cities = array_merge(['selected' => $schoolDistrict->city_id], ['data' => City::where('country_id', $schoolCity->country_id)->pluck('name_en', 'id')->toArray()]);
        $selectedCountry = $schoolCity->country_id;
        $countries = array_merge(['selected' => $selectedCountry], ['data' => Country::pluck('name_en', 'id')->toArray()]);
        $facilitiesTypes = FacilityType::get();
        $facilitiesValueSchool = $school->facility_value_schools->pluck('facility_value_id')->toArray();
        if ($school->seo) {
            $school->push(@$school->seo->toArray());
        }
        return view('admin.schools.edit', compact('countries', 'districts', 'cities', 'school', 'facilitiesTypes', 'facilitiesValueSchool'));
    }

    /* Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        $this->validate(
            $request,
            ['name_ar' => 'required|max:250',
                'name_en' => 'required|max:250',
                'student_num' => 'required|max:250',
                'log' => 'image',
                'phone' => 'required',
                'email' => 'unique:schools,email,' . $school->id,
                'website' => 'url',
                'facebook' => 'url', 'linkedin' => 'url', 'instagram' => 'url', 'youtube' => 'url', 'google+' => 'url',
                'admission_url' => 'url',
                'admission_date' => 'date',
                'address_ar' => 'required',
                'address_en' => 'required',
                'about_ar' => 'required',
                'about_en' => 'required',
                'district_id' => 'required',
                'facilities' => 'required']
        );


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

        $school->update($request->all());
        /*dd($request->images);*/

        if (count($request->images) != null) {
            foreach ($request->images as $image) {
                $school->school_gallery_images()->create(['url' => $image->store('schools/gallery')]);
            }
        }
        if ($request->has('updateFees')) {
            foreach ($request->updateFees as $fee_id => $values) {
                Fee::find($fee_id)->update($values);
            }
        } else {
            Fee::where('school_id', $school->id)->delete();
        }

        if ($request->has('fees')) {
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

        FacilityValueSchool::where('school_id', $school->id)->delete();
        if ($request->has('facilities')) {
            foreach ($request->facilities as $facility) {
                $school->facility_value_schools()->create(['facility_value_id' => $facility]);
            }
        }


        /**********************************************/
        /****************** SEO Code ******************/
        /**********************************************/
        /*if($request->hasFile('fb_og_image')){
            $request->merge(['og_image'=>$request->file('fb_og_image')->store('seoschools/images')]);
        }

        if($request->hasFile('tt_image')){
            $request->merge(['twitter_image'=>$request->file('tt_image')->store('seoschools/images')]);
        }

        $school->seo()->updateOrCreate($request->only([
            'page_title_ar',
            'page_title_en',
            'meta_description_ar',
            'meta_description_en',
            'meta_keywords_ar',
            'meta_keywords_en',
            'og_local',
            'og_type',
            'og_description',
            'og_image',
            'twitter_card',
            'twitter_description',
            'twitter_image',
            'school_id',
        ]));*/


        /*        $seo = new SeoSchools;
                $seo->school_id = $school->id;
                $seo->page_title_ar = $request->page_title_ar;
                $seo->page_title_en = $request->page_title_en;
                $seo->meta_description_ar = $request->meta_description_ar;
                $seo->meta_description_en = $request->meta_description_en;
                $seo->meta_keywords_ar = $request->meta_keywords_ar;
                $seo->meta_keywords_en = $request->meta_keywords_en;
                $seo->og_local = $request->og_local;
                $seo->og_type = $request->og_type;
                $seo->og_description = $request->og_description;
                $seo->twitter_card = $request->twitter_card;
                $seo->twitter_description = $request->twitter_description;


                $seo->twitter_image = $request->file('tt_image')->store('seoschools/images');
                $seo->og_image = $request->file('fb_og_image')->store('seoschools/images');
                $seo->save();
        */


        /* $school->seo()->where('school_id', $school->id)->update($request->only([

                   'page_title_ar',
                    'page_title_en',
                    'meta_description_ar',
                    'meta_description_en',
                    'meta_keywords_ar',
                    'meta_keywords_en',
                    'og_local',
                    'og_type',
                    'og_description',
                    'og_image',
                    'twitter_card',
                    'twitter_description',
                    'twitter_image',

             ]));*/


        $seo = SeoSchools::where('school_id', $school->id)->first();

        if (count($seo) == 0) {
            $seo = new SeoSchools;
        }

        $seo->school_id = $school->id;
        $seo->page_title_ar = $request->page_title_ar;
        $seo->page_title_en = $request->page_title_en;
        $seo->meta_description_ar = $request->meta_description_ar;
        $seo->meta_description_en = $request->meta_description_en;
        $seo->meta_keywords_ar = $request->meta_keywords_ar;
        $seo->meta_keywords_en = $request->meta_keywords_en;
        $seo->og_local = $request->og_local;
        $seo->og_type = $request->og_type;
        $seo->og_description = $request->og_description;
        $seo->twitter_card = $request->twitter_card;
        $seo->twitter_description = $request->twitter_description;

        if ($request->has('file')) {
            $seo->twitter_image = $request->file('tt_image')->store('seoschools/images');
            $seo->og_image = $request->file('fb_og_image')->store('seoschools/images');
        }
        $seo->save();

        return redirect(url('admin/schools'));
    }

    public function createComment(Request $request)
    {// dd($request->all());
        $validator = Validator::make($request->all(), [
          'text'      => 'required',
          'school_id' => 'required|numeric|exits:schools,id',
      ]);
        $comment = new Comment;
        $comment->text= $request->text;
        $comment->school_id= $request->school_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect()->back();
    }

    public function createReplay(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'text'       => 'required',
          'comment_id' => 'required|numeric|exits:comments,id',
      ]);
        $replay = new Replay;
        $replay->text = $request->text;
        $replay->comment_id = $request->comment_id;
        $replay->user_id = Auth::user()->id;
        $replay->save();

        return redirect()->back();
    }

    public function rate(Request $request)
    {
        $this->validate($request, [
          'school'      => 'required',
          'rating'      => 'required'
      ]);
      // Auth::loginUsingId(14);
        $rate = new SchoolRate();
/*        $rate->user_id = Auth::user()->id;*/
        $rate->school_id = $request->school;
        $test=$rate->rate = $request->rating;
        $rate->save();
        return back();
    }

    public function getAddSchool()
    {
        $facilitiesTypes = FacilityType::get();
        $countries = Country::all();

        //$school = School::all();
        return view(
          'website.schools.addschool',
          [
            'facilitiesTypes' => $facilitiesTypes,
            //'school'=>$school,
            'countries' => $countries

          ]
      );
        // return view('website.schools.addschool');
    }

    public function addSchool(Request $request)
    {
        $this->validate(
            $request,
            [
                'name'=>'required|max:250',
                'logo'=>'required|image',
                'phone'=>'required|max:250',
                'email'=>'email|max:250',
                'district_id'=>'numeric|required',
                'facilities'=>'required',
                'longitude'=>'required',
                'latitude'=>'required',
            ]
        );

        $request->merge(['active' => 0]);
        $request->merge(['verified' => 0]);

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
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->store('schools/logo');
            $request->merge(['logo' => $logo]);
        }

        if (!$request->has('admission_date')) {
            $request->merge(['admission_date' => null]);
        }


        // dd($request->all());
        $school = School::create($request->all());

        if (count($request->images) != null) {
            foreach ($request->images as $image) {
                $school->school_gallery_images()->create(['url' => $image->store('schools/gallery')]);
            }
        }

        if ($request->has('fees')) {
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



        if ($request->facilities) {
            foreach ($request->facilities as $facility) {
                $school->facility_value_schools()->create([
                'facility_value_id'=>$facility,
                'school_id' => $school->id
              ]);
            }
        }
        return Redirect::back()->with(['status', 'success']);
        ;
    }



    public function getEditRequest()
    {
        $edits = EditRequests::all();
        return view('website.schools.editrequest', compact('edits'));
    }

    public function sitemap()
    {
        return view('website.schools.sitemap');
    }
}
