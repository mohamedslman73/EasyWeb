<?php

namespace App\Http\Controllers\admin;

use App\Partner;
use App\SeoPartners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;


class PartnersController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.partners.index');
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[  'name_ar'=>'required|arabic_only',
                                    'name_en'=>'required|english_only',
                                    'log'=>'required|image',
                                    'about_ar'=>'required|arabic_only',
                                    'about_en'=>'required|english_only',
                                    'facebook'=>'url',
                                    'youtube'=>'url',
                                    'instagram'=>'url',
                                    'linkedin'=>'url']);

        if ($request->hasFile('log')){
            $logo=$request->file('log')->store('partners/images');
            $request->merge(['logo'=>$logo]);
        }
        $request->merge(['active'=>1]);
        $request->merge(['slug_ar'=>$request->name_ar]);
        $request->merge(['slug_en'=>$request->name_en]);
        Partner::create($request->all());
        return redirect('lead/partners');
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
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit',compact('partner'));
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {

        $this->validate($request,[  'name_ar'=>'required|arabic_only',
                                    'name_en'=>'required|english_only',
                                    'about_ar'=>'required|arabic_only',
                                    'about_en'=>'required|english_only',
                                    'facebook'=>'url',
                                    'youtube'=>'url',
                                    'instagram'=>'url',
                                    'linkedin'=>'url']);
        if ($request->hasFile('log')){
            $logo=$request->file('log')->store('partners/images');
            $request->merge(['logo'=>$logo]);
        }
        $request->merge(['slug_ar'=>$request->name_ar]);
        $request->merge(['slug_en'=>$request->name_en]);
        $partner->update($request->all());
        return redirect('lead/partners');
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return back();
    }

    public function activate(Partner $partner)
    {
        if($partner->active ==0) {
            $partner->update(['active' => 1]);
        }else{
            $partner->update(['active' => 0]);
        }
        return back();
    }


    public function datatable()
    {

        $partners=Partner::all();

        return DataTables::of($partners)

            ->editColumn('active',function ($model){
                $data=renderAction($model,'PartnersController','activate',$model->active);
                return $data;
            })
            ->editColumn('control',function ($model){
                $data=renderOptions($model,'PartnersController','partners');
                return $data;
            })
            ->make(true);

    }
}
