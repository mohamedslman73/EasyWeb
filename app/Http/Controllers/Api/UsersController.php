<?php

namespace App\Http\Controllers\Api;

use App\District;
use App\Favorite;
use App\School;
use App\User;
use App\UserTokens;
use Validator;
use Illuminate\Http\Request;
use App\Mail\Forgetpassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\Sentinel;
use Illuminate\Auth\Reminder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Mail\OrderShipped;


class UsersController extends ApiController
{

    /////////////////////////////////////////////////////
    /////////////// Login & Register ////////////////////
    /////////////////////////////////////////////////////

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          =>'required',
            'email'         =>'required|email|unique:users',
            'password'      =>'required|confirmed',
            /*'img'           =>'image',*/
            /*'school_id'        =>'required',*/
            // 'district_id'   =>'required',
            'terms'         =>'nullable|boolean',
        ]);

// then, if it fails, return the error messages in JSON format
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        /*$request->validate([
            'name'          =>'required',
            'email'         =>'required|email|unique:users',
            'password'      =>'required|confirmed',
            //'img'           =>'image',
            //'school_id'        =>'required',
           // 'district_id'   =>'required',
            'terms'         =>'nullable|boolean',

        ]);*/

        if ($request->hasFile('img')) {
            $request->merge(['image' => $request->file('img')->store('schools/images')]);
        }else{
            $request->merge(['image'=>'users/user.png']);
        }
        if ($request->has('password')) {
            $request->merge(['password' => bcrypt($request->password)]);
        }
        if ($request->ex_school=='' ) {
            $request->merge(['school_id' => $request->school_id]);
        } else {
            $request->merge(['school_id' => null]);
            $request->merge(['ex_school' => $request->ex_school]);
        }
//        if (!$request->terms) {
//            return $this->fire([], null, [__('api.accptTerms')]);
//        }
        $user = User::create($request->except('school'));
        $token = ['api_token' => str_random(60)];
        $user->userTokens()->create($token);
        $data=$user->toArray();
        return $this->fire(array_merge($data, $token),'done');
       // return $this->fire(array_merge($user->toArray(), $token), 'usrRegSccs');
    }

    public function login($guard , Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            ]);
        //then, if it fails, return the error messages in JSON format
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        /*$this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);*/
        //$cerdentials  = ['email'=>$request->email,'password'=>$request->password];
        if (Auth::guard('users')->attempt(['email'=>$request->email,'password'=>$request->password])) {
            $new_token = ['api_token' => str_random(60)];

            Auth::guard('users')->user()->userTokens()->update($new_token);
            return $this->fire(array_merge(Auth::guard('users')->user()->toArray(), $new_token), 'lgnSuccess');
        }
        return $this->fire([], null,[__('api.wrngCerdintial')]);
    }

    public function fblogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'facebook'=>'required',
        ]);

// then, if it fails, return the error messages in JSON format
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        /*$this->validate($request,[
            'facebook'=>'required',
            'email'=>'unique:users',
        ]);*/
        $face = User::where('facebook',$request->facebook)->value('facebook');
        if(User::where('facebook',$request->facebook)->count() > 0){
            //this facebook id is registered
            $user = User::where('facebook', $request->facebook)->first();
            $token = new UserTokens();
            $token->api_token = str_random(60);
            $token->user_id = $user->id;
            $token->save();
            return response()->json((['scode'=>200,'user'=>$user,'token'=>$token->api_token ]));
          //  return $this->fire($user,$token->api_token);
        }else{
            $user = new User();
    //        dd($request->all());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->facebook = $request->facebook;
            $user->password = bcrypt($request->facebook *2);
            $user->save();
            $token = new UserTokens();
            $token->api_token = str_random(60);
            $token->user_id = $user->id;
            $token->save();
           return response()->json(['scode'=>200,'user'=>$user,'token'=>$token->api_token]);
           // return $this->fire($user,$token->api_token);
        }

/*    $request1 = json_decode($request->getContent(), true);
    $client = Client::find(2);
    $lead = @Lead::where('facebook', $request1['fbid'])->first();

    if (Lead::where('facebook', $request1['fbid'])->count() > 0) {
        $request->request->add(
            [
                'username' => @$lead->email,
                'password' => $request1['fbid'],
                'client_id' => $client->id,
                'client_secret' => $client->secret,
                'grant_type' => 'password',
                'response_type' => 'code',
                'scope' => '',
            ]
        );
        $tokenRequest = Request::create(
            env('APP_URL') . '/oauth/token',
            'post'
        );
        $token = json_decode(Route::dispatch($tokenRequest)->getContent());
        if (@$token->access_token) {
            $response = array(
                "status" => 'ok',
                "id" => $lead->id,
                "fname" => $lead->first_name,
                "lname" => $lead->last_name,
                "email" => $lead->email,
                "phone" => $lead->phone,
                "token" => $token,
            );

            return json_encode($response);
        } else {
            return ['status' => 'error'];
        }
    } else {
        return ['status' => 'not found'];
    }*/
}


    /////////////////////////////////////////////////////
    /////////////// Favorite Schools ////////////////////
    /////////////////////////////////////////////////////

    public function addUserFavorite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'school_id'=>'required'
        ]);

// then, if it fails, return the error messages in JSON format
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        /*$this->validate($request,[
            'school_id'=>'required'
        ]);*/
        $user = $this->getUserObject();
        $school=$request->school_id;

        $add=Favorite::create(['user_id'=>$user->id,
            'school_id'=>$school]);

        return $this->fire(array_merge($add->toArray()),'Schools is added');
    }

    public function getUserFavorites()
    {

        $user = $this->getUserObject();
        $favorites =Favorite::where("user_id",$user->id)->with('school')->get();

        if (count($favorites)==0){
            return $this->fire("You don't have favorites");
        }
        $schoolFavorite=[];
        foreach ($favorites as $key=>$favorite){
            $schoolFavorite[$key]['id']=$favorite->school_id;
            $schoolFavorite[$key]['logo']=$favorite->school->logo;
            $schoolFavorite[$key]['name']=$favorite->school['name_'.app()->getLocale()];
            $schoolFavorite[$key]['about']=$favorite->school['about_'.app()->getLocale()];
        }
        return $this->fire($schoolFavorite);

    }

    public function deleteUserFavorite(Request $request){

        $this->validate($request,['school_id'=>'required']);
        $user = $this->getUserObject();
        $school=$request->school_id;
        $delete=Favorite::where('school_id',$school)
            ->where('user_id',$user->id)
            ->delete();
        if($delete!=0){
            return $this->fire('Deleted Done');
        }
        return $this->fire('Deleted NOT done,Please check it again .');
    }


    /////////////////////////////////////////////////////
    ////////////////////// User /////////////////////////
    /////////////////////////////////////////////////////

    public function getUser(Request $request)
    {
        $user = $this->getUserObject();
        $userArray = [];
        $userArray['id'] = $user->id;
        $userArray['name'] = $user->name;
        $userArray['image'] = $user->image;
        $userArray['phone'] = $user->phone;
        $userArray['email'] = $user->email;
        $userArray['address'] = $user->address;
        $userArray['active'] = $user->active;
        $userArray['newsletter'] = $user->newsletter;
        $userArray['type'] = $user->type;
        $userArray['district_id'] = $user->district_id;
        if($user->district_id!=null){
            $userArray['city_id'] = District::find($user->district_id)->city_id;
        }else{
            $userArray['city_id']=null;
        }
        if (!$user->school_id == null) {
            $userArray['school'] = $user->school['name_' . app()->getLocale()];
        } else {
            $userArray['school'] = $user->ex_school;
        }

        return $this->fire($userArray);

    }
    public function  editUser(Request $request)
    {
        $user = $this->getUserObject();
        $validator = Validator::make($request->all(), [
            'name'          =>'string',
            'email'         =>'email|unique:users,email,'.$user->id,
            'img'           =>'image',
        ]);

        // then, if it fails, return the error messages in JSON format
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        /*$this->validate($request,[
            'name'          =>'string',
            'email'         =>'email|unique:users,email,'.$user->id,
            'img'           =>'image',
        ]);*/
        $user=User::find($user->id);
        if ($request->hasFile('img')) {
            $request->merge(['image' => $request->file('img')->store('users/images')]);
        }
        if ($request->has('password')) {
            $request->merge(['password' => bcrypt($request->password)]);
        }
        if ($request->ex_school=='' ) {
            $request->merge(['school_id' => $request->school_id]);
        } else {
            $request->merge(['school_id' => null]);
            $request->merge(['ex_school' => $request->ex_school]);
        }
        $user->update($request->all());
        return $this->fire(array_merge($user->toArray()), 'Updated');

    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'oldPassword'=>'required',
            'newPassword'=>'required'
        ]);

// then, if it fails, return the error messages in JSON format
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }
        /*$this->validate($request,[
            'oldPassword'=>'required',
            'newPassword'=>'required'
        ]);*/

        $user = $this->getUserObject();
        $oldpassword = $request->oldPassword;
        $newpassword = $request->newPassword;
        if(!Hash::check($oldpassword,$user->password)){

            return $this->fire([],null,['Password Not Correct']);
        }
        $request->merge(['password' => bcrypt($newpassword)]);
        $user=User::find($user->id)->update(['password'=>$request->password]);
        /*$user->password=$password;
        $user->save();*/

        /*$updated=User::find($user->id)->Update(['password'=>$password]);*/

        return $this->fire($user, 'Changed');

    }

    public function forgetPassword(Request $request){
        $email=$request->email;
        //check if email is exist or not
        $check=DB::table('users')->where('email',$email)->first();
        if(empty($check)){
            return $this->fire([],null,['This Email Does Not Exit']);
        }else{
            //updating activation code
            $code=uniqid();
            DB::table('users')->where('email',$email)->update(['activation_code'=>$code]);
            Mail::to($email)->send(new Forgetpassword($code));
            return response()->json(['success'=>1]);
        }
    }


    public function logout()
    {
        $user = Auth::guard('userApi')->user();
        $user->api_token = "";
        $user->save();
        return $this->fire("Successfully Logged Out");
    }
}