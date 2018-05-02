@extends("layouts.app")
@section('upperSlogan')
    Your Profile
@endsection
@section('css')
    <link href="{{loadAsset('backend/website/css/userProfileStyle.css')}}" rel="stylesheet"/>
@endsection
@section('content')

<style>
    .modal-content{
        background: url('{{loadAsset('backend/website/pic/Texture.png')}}') fixed center no-repeat ;
        max-height: 500px;
        max-width: 500px;
        border-radius: 20px;
        border: 2px solid #053460;
        background-color: white;
    }
    .user-prof-pic {
        background: url('{{--{{loadAsset($user->image)}}--}}') no-repeat center bottom;
        background-size: contain;
        background-color: white;
    }
</style>
    <!--============================ start  al bod-box =================================-->
    <div style="margin-top: 10%;" class="container bod-add-all">
        @if (session()->has('massage'))
            <small class="alert alert-danger">
                <h3>{!! session()->get('massage') !!}</h3>
            </small>
        @endif
        <form action="{{route('user.edit',['lang'=>app()->getLocale()])}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 head-of-wiz text-center">
                    <div class="user-prof-pic"></div>

                    <div class="col-md-12 text-center">

                        <div class=" a-s-i-ad-ph register-upload-img text-center ">
                            <input type="file" name="img" id="image" class="hidden plac-to-edit-info" accept="image/*">
                            <label  for="image" class="btn plac-to-edit-info"><i class="fa fa-user-circle " aria-hidden="true"></i>Change Picture</label>
                           <br>
                        </div>
                        <div>
                            <p class="text-to-edit-info"><i class="fa fa-thumb-tack" aria-hidden="true"></i> don't have address</p>
                            <p class="plac-to-edit-info"><i class="fa fa-thumb-tack" aria-hidden="true"></i>
                                <input class="form-control plac-to-edit-info" placeholder="address" name="new" type="text">
                            </p>
                        </div>
                    </div>
                    <div>
                        <p>
                        <h3 class="text-to-edit-info">{{$user->name}}</h3>
                        <input class="form-control plac-to-edit-info" placeholder="name" name="yourName" type="text">
                    </div>
                    <div>
                        <p class="text-to-edit-info">{{$user->email}}</p>
                        <input class="form-control plac-to-edit-info" placeholder="email" name="mail" type="text">
                    </div>
                    <div>
                        <p class="text-to-edit-info">{{ ($user->phone)? $user->phone : "don't have phone number" }}</p>
                        <input class="form-control plac-to-edit-info" placeholder="phone" name='number' type="text">
                    </div>

                    <div class="bor-der"></div>
                </div>
            </div>

            <div class="col-md-6 main-p-r">
                <div class=" left-box-info-user-p">
                    <div>
                        <p class="text-to-edit-info"><i class="fa fa-globe" aria-hidden="true"></i> {{ ($user->district_id)? App\District::find($user->district_id)->city['name_'.app()->getLocale()] : "don't have City" }}
                        </p>
                        <p class="plac-to-edit-info"><i class="fa fa-globe" aria-hidden="true"></i>
                            <select class="form-control  btn-md" name="city_id" id="city_id">
                                <option selected disabled>City</option>
                                @foreach(App\City::all() as $city)
                                <option value="{{$city->id}}">{{$city['name_'.app()->getLocale()]}}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>

                    <div>
                        <p class="text-to-edit-info"><i class="fa fa-location-arrow " aria-hidden="true"></i>{{ ($user->district_id)? App\District::find($user->district_id)['name_'.app()->getLocale()] : "don't have District" }}
                        </p>
                        <p class="plac-to-edit-info"><i class="fa fa-location-arrow" aria-hidden="true"></i>
                            <select  class="form-control   btn-md" id="district_id" name="district_id">
                                <option value="0" disabled selected >Districts</option>
                            </select>
                        </p>
                    </div>


                    <div>
                        <p class="text-to-edit-info"><i class="fa fa-thumb-tack" aria-hidden="true"></i> {{ ($user->address)? $user->address : "don't have address" }}</p>
                        <p class="plac-to-edit-info"><i class="fa fa-thumb-tack" aria-hidden="true"></i>
                            <input class="form-control plac-to-edit-info" placeholder="address" name='addr' type="text">
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 main-p-l">
                <div class=" right-box-info-user-p">
                    <div>
                        <p class="text-to-edit-info"><i class="fa  fa-university" aria-hidden="true"></i>{{($user->school_id)? App\School::find($user->school_id)['name_'.app()->getLocale()] : "don't have School"}}
                        </p>
                        <p class="plac-to-edit-info"><i class="fa  fa-university" aria-hidden="true"></i>
                            {{Form::select('school',$schools,$user->school_id,['class'=>'form-control  school-register-center select2','id'=>'district_id'])}}
                        </p>
                    </div>

                    <p class="text-to-edit-info"><i class="fa fa-user-o" aria-hidden="true"></i>
                        @php
                        switch ($user->type) {
                        case 1:
                        echo "manger";
                        break;
                        case 2:
                        echo "teacher";
                        break;
                        case 3:
                        echo "parent";
                        break;
                        case 4:
                        echo "student";
                        break;
                        default:
                        echo "Unknown";
                        }
                        @endphp
                    </p>

                    <p class="plac-to-edit-info"><i class="fa fa-user-o" aria-hidden="true"></i>
                        <select class="form-control" name="type">
                            <option disabled selected>Type</option>
                            <option value="1">Student</option>
                            <option value="2">Parent</option>
                            <option value="3">Teacher</option>
                            <option value="4">Manager</option>
                        </select>
                    </p>


                    <p data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  id="chang-pas-but"><i class="fa fa-unlock-alt" style="margin-right: 10px" aria-hidden="true"></i> CHANGE PASSWORD</p>

                </div>
            </div>

            <div class="col-md-12 " id="pro-us-edit">
                <p class="text-to-edit-info pull-right"><i class="fa fa-pencil" aria-hidden="true"></i> Edit </p>
                <button class="plac-to-edit-info sub-ch-info-us pull-right" type="submit">submit</button>
            </div>

        </div>
        </form>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"> Change your password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="{{route('user.changePassword',['lang'=>app()->getLocale()])}}" method="post"enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">

                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Old password:</label>
                                    <input type="password" class="form-control" name="oldPassword" id="recipient-name">
                                    <small class="text-danger">{{$errors->first('oldPassword')}}</small>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name1" class="form-control-label">New password:</label>
                                    <input type="password" class="form-control" name="password" id="recipient-name1">
                                    <small class="text-danger">{{$errors->first('password')}}</small>
                                </div>

                                <div class="form-group2">
                                    <label for="recipient-name" class="form-control-label">Retype new password:</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="recipient-name2">
                                    <small class="text-danger">{{$errors->first('password_confirmation')}}</small>
                                </div>


                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
            </div>
        </div>
    </div>



    <script>
        //to display cities
        $(document).on('change','#city_id',function () {
            var id = $(this).val();
            var _token = '{{ csrf_token() }}';
            $.ajax({
                url:'{{ url('/districts') }}',
                type:'get',
                dataType:'html',
                data: {id:id,_token:_token},
                success:function (data) {
                    $("#district_id").html(data)
                }
            })
        })
    </script>

    <script>
        $("#pro-us-edit").click(function () {
            $(".text-to-edit-info").hide();
            $(".plac-to-edit-info").show();
            $(".plac-to-edit-info").each(function () {
                $(this).find('input').val($(this).parent().find('.text-to-edit-info').text());
            })

        })

        $("#chang-pas-but").click(function () {

            $(".plac-to-edit-pass").slideToggle();
        })
    </script>











@stop
