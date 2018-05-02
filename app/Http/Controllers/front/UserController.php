<?php

namespace App\Http\Controllers\front;

use App\City;
use App\Compare;
use App\District;
use App\Favorite;
use App\Mail\Forgetpassword;
use App\Replay;
use App\School;
use App\Solution;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

             /////////////////////////////////////////////////////
            ////////////////////// User /////////////////////////
           /////////////////////////////////////////////////////

    public function getUser()
    {
        $user=Auth::user('users')->id;
        $user=User::find($user);
        $schools=School::pluck('name_'.app()->getLocale(),'id');
        return view('website.user.userProfile',compact('user','schools'));
    }
      /////////////////////////////////////////////////////
     /////////////////////// Edit ////////////////////////
    /////////////////////////////////////////////////////

    public function editUser(Request $request)
    {
        $this->validate($request,['img'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
        $user_id=Auth::user()->id;
        $user=User::find($user_id);
        if($request->hasFile('img')){
            $request->merge(['image'=>$request->file('img')->store('users/images')]);
        }
        if($request->name != ''){
            $request->merge(['name_'.app()->getLocale()=>$request->name]);
        }
        if($request->number !=''){
            $request->merge(['phone'=>$request->number]);
        }
        if($request->addr !=''){
            $request->merge(['phone'=>$request->addr]);
        }
        if($request->mail !=''){
            $request->merge(['email'=>$request->mail]);
        }
        if($request->yourName !=''){
            $request->merge(['email'=>$request->yourName]);
        }
        $user->update($request->all());
        return back();
    }

      /////////////////////////////////////////////////////
     ///////////////// update password ///////////////////
    /////////////////////////////////////////////////////

    public function updatePassword(Request $request)
    {
        $this->validate($request,[
        'oldPassword'           =>'required',
        'password'              => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6']);

        $oldpassword = $request->oldPassword;
        $newpassword = $request->password;
        if(!Hash::check($oldpassword,Auth::user()->password)){

                session()->flash('massage', 'Old Password Not Correct,Please Try Again');
                return back();
            }
        else{
            $updated=$request->user()->fill([
                'password' => Hash::make($newpassword)
            ])->save();
            return back()->with('Done');
        }
    }

      /////////////////////////////////////////////////////
     ///////////////// forget password ///////////////////
     /////////////////////////////////////////////////////

    public function forgetPassword(Request $request){
        $email=$request->email;
        //check if email is exist or not
        $check=DB::table('users')->where('email',$email)->first();
        if(empty($check)){
            return redirect()->back()->with('error','This Email Does Not Exit');
        }else{
            //updating activation code
            $code=uniqid();
            $table=DB::table('users')->where('email',$email);
                $table->update(['activation_code'=>$code]);
               $name=$table->first()->name;
            Mail::to($email)->send(new Forgetpassword($code,$name));
            return redirect()->back()->with('success','Please Check Your Mail');
        }
    }

    public function changePasswordView(Request $request)
    {
        $code=$request->code;
        $user=$request->name;
        return view('website.user.forgetPassword',compact('code','user'));
    }

    public function DoChangePassword(Request $request)
    {
        $this->validate($request,[
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6']);

        $user=User::where('name',$request->name)->where('activation_code',$request->code)->first();
        $user->password=bcrypt($request->password);
        $user->save();

        Auth::login($user);
        return redirect('/');
    }

          /////////////////////////////////////////////////////
         /////////////////// Favorite ////////////////////////
        /////////////////////////////////////////////////////

    public function displayFavorite()
    {
        /*$user=$user=Auth::user()->id;*/
        $userID = Auth::id();
        // $school_checkbox = Session::get('school_checkbox');
        $schoolID = Favorite::where('user_id',$userID)->get(['school_id']);
        $favorites= School::whereIn('id',$schoolID)->get();
        /*$favorites=Favorite::where('user_id',$user)->with('school')->get();*/
        return view('website.user.favorite',compact('favorites'));
    }
    public function addFavoriteSchool(Request $request)
    {
        $school=$request->school;
        $user=Auth::user()->id;
        Favorite::create(['user_id'=>$user,
                            'school_id'=>$school]);
        return response()->json(['status'=>'done']);
    }
    public function deleteFavoriteSchool(Request $request)
    {
        $school=$request->school;
        $user=Auth::user()->id;
        Favorite::where('school_id',$school)
            ->where('user_id',$user)
            ->delete();
        return response()->json(['status'=>'done']);
    }

          /////////////////////////////////////////////////////
         //////////////////// Compare ////////////////////////
        /////////////////////////////////////////////////////
    public function addCompare(Request $request)
    {
        $school=$request->school;
        $user=Auth::user()->id;
        Compare::create([   'user_id'  =>$user,
            'school_id'=>$school]);
        return response()->json(['status'=>'done']);
        /*$schools=$request->schools;
        if ($schools==null){

            return response()->json('done');
        }
        Session::forget('compareSchools');

        $schools=array_unique($schools);

        session()->push('compareSchools',$schools);
        return response()->json('done');*/

    }

    public function deleteComparedSchool(Request $request)
    {
        $school=$request->school;
        $user=Auth::user()->id;
        Compare::where('school_id',$school)
            ->where('user_id',$user)
            ->delete();
        return response()->json(['status'=>'done']);
    }

    public function getCompare(Request $request)
    {
        //  $school_ids=session()->get('compareSchools');
        // $schools=School::whereIn('id',$school_ids[0])->with(['fees','facility_value_schools'])->get();

        //return view('website.user.compare',compact('schools'));
        $userID = Auth::id();
        // $school_checkbox = Session::get('school_checkbox');
        $schoolID = Compare::where('user_id',$userID)->get(['school_id']);
        $schools = School::whereIn('id',$schoolID)->get();

        if($request->has('name')){
            $name = $request->name;
            if (count('name') >0){
                $school_checkbox = School::whereIn('id',$name)->get();
                Session::put('school_checkbox',$school_checkbox);
                return view('website.user.compare',compact('schools','school_checkbox'));
            }
        }


        return view('website.user.compare',compact('schools','school_checkbox'));

    }
   /* public function checkbox(Request $request)
    {
        //   return $request->all();
        $name = $request->name;
        if (count('name') >0){
            $school_checkbox = School::whereIn('id',$name)->get();
            Session::put('school_checkbox',$school_checkbox);
            //  return view('website.user.compare',compact('school_checkbox'));
            return redirect()->to(app()->getLocale().'/compare');
        }elseif(count('name') == null or count('name') == 0 ){
            $school_checkbox = School::limit(4)->get();
            return view('website.user.compare',compact('school_checkbox'));
        }
    }*/

}
