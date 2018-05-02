<?php

namespace App\Http\Controllers\admin;

use App\Lead;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
    /*Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admins.index');
    }

    /* Show the form for creating a new resource.
     */
    public function create()
    {
        $admins=Lead::pluck('name','id');
        return view('admin.admins.create',compact('admins'));
    }

    /* Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|english_only',
            'email'=>'required|email|unique:leads',
        ]);

        Lead::create($request->all());
        return view('admin.admins.index');
    }

    /* Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /* Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        return view('admin.admins.edit',compact('lead'));
    }

    /* Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $this->validate($request,[
            'name'=>'required|english_only',
            'email'=>'required|email|unique:leads,email,'.$lead->id,

        ]);
        if($request->has('password')) {
            $request->merge(['password'=>bcrypt($request->password)]);
        }else{
            $request->merge(['password'=>$lead->password]);
        }
        $lead->update($request->all());
        return view('admin.admins.index');
    }

    /* Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();
        return back();
    }

    /*to display datatables
        */
    public function datatable()
    {
        $leads=Lead::all();

        return DataTables::of($leads)
            ->editColumn('control',function ($model){
                $data=renderOptions($model,'AdminsController','leads');
                return $data;
            })
            ->make(true);
    }
}
