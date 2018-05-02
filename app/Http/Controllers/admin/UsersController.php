<?php

namespace App\Http\Controllers\admin;

use App\School;
use App\SchoolGalleryImage;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
class UsersController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $school=School::pluck('name_en','id');
        return view('admin.users.create',compact('school'));

    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {/*dd($request->all());*/
        $this->validate($request,[
            'name'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'=>'required|email|unique:users',
            'phone'=>'required',
            'address'=>'required',
            'password'=>'required|min:6',
            'password2'=>'required|min:6',
            'type'=>'required',
            'school_id'=>'required',
        ]);
        $request->merge(['active'=>1]);
        if($request->has('password')){
            $request->merge(['password'=>bcrypt($request->password)]);
        }
        if($request->hasFile('img')){
            $logo=$request->file('img')->store('schools/images');
            $request->merge(['image'=>$logo]);
        }
        User::create($request->all());
        return redirect(url('lead/users'));
    }

    /*
     * Display the specified resource.
     */
    public function show(User $user)
    {

    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $school=School::pluck('name_en','id');
        return view('admin.users.edit',compact('user','school'));
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->merge(['active'=>1]);
        $this->validate($request,[
            'name'=>'required',
            'img'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone'=>'required',
            'address'=>'required',
            'password'=>'min:6',
            'email'=>'email|required|unique:users,email,'.$user->id,
            'type'=>'required',
            'school_id'=>'required',
            'district_id'=>'required',
        ]);
        if($request->hasFile('img')){
            $logo=$request->file('img')->store('schools/images');
            $request->merge(['image'=>$logo]);
        }
/*        dd($request->all());*/
        $user->update($request->all());
        return redirect('/lead/schools');
    }

    public function activate(School $school)
    {
        if($school->active ==0) {
            $school->update(['active' => 1]);
        }else{
            $school->update(['active' => 0]);
        }
        return back();
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
    public function datatable()
    {

        $users=User::all();

        return DataTables::of($users)
            ->editColumn('type',function ($model){
                switch ($model->type) {
                    case 1:
                        return "manger";
                        break;
                    case 2:
                        return "teacher";
                        break;
                    case 3:
                        return "parent";
                        break;
                    case 4:
                        return "student";
                        break;
                    default:
                        return "Unknown";
                }
            })
            ->editColumn('school_id',function ($model){
                if($model->school_id != null){
                    return $model->school['name_en'];
                }
                return $model->ex_school;
            })

            ->editColumn('active',function ($model){
                $data=renderAction($model,'UsersController','activate',$model->active);
                return $data;
            })
            ->editColumn('control',function ($model){
                $data=renderOptions($model,'UsersController','users');
                return $data;
            })
            ->make(true);

    }

}
