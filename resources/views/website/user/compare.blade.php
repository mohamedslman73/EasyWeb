@extends("layouts.app")
@section('title')
    Compare
@endsection
@section('content')
    <!-- ======= ========== ====== Start PopUp ==================== -->
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content modal-com-content" style="margin-top: 110px;">
                <div style="border-bottom: none" class="modal-header">
                    <div class="col-md-12 text-center"><!-- header -->
                        <p><i class="fa fa-bars"></i>Select school to compare</p>
                    </div><!--end header -->
                </div>
                <form method="post" action="{{route('compare', ['lang'=>'en'])}}">
                    {{csrf_field()}}
                <div class="modal-body"><!-- modal body -->
                    <div  class="col-md-12 wrap-all-s-c">
{{--
                        @if(isset($schools) && $schools->count() >0)
--}}
                        @foreach($schools as $school)
                        <div class="col-md-6">
                            {{--cor-s-t-c--}}
                            <label for="{{$school->id}}" class="cor-s-t-c">
                                <img class="col-md-4" src="{{$school->logo}}" alt="EasySchools-{{$school['name_'.app()->getLocale()]}}-logo">
                                {{--sch-name-t-com--}}
                                <p class="col-md-8 ">{{$school['name_'.app()->getLocale()]}}</p>
                            </label>

                            <input style="visibility: hidden;" class='vehicle' name="name[]" id="{{$school->id}}" type="checkbox" value="{{$school->id}}">

                        </div>

                        @endforeach
{{--
                        @endif
--}}
                    </div>
                </div><!--end modal body -->
                <div style="border-top: none" class="modal-footer">
                    <button type="submit" class="btn btn-default btn-com-pop">Compare</button>
                </div>
                </form>
            </div>

        </div>
    </div>

    <!--====================== *********Start Section Copmare ********** ===================-->

    <section class="ho-compa" style="margin-top: 70px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>WELCOME TO EASYSCHOOLS</h3>
                    <h4>Schools compare</h4>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">

            <div class="col-md-12 ">
                <i data-toggle="modal" data-target="#myModal" class="pull-right fa fa-bars fa-2x">
                    <span style="text-decoration: underline">School List</span>
                </i>
            </div>

            <div class="col-xs-12">
                <hr class="hr-text" data-content="FEES">
            </div>
        </div>
    </section>

    <!-- ============================================ Start Section Compare ================================================== -->

    <section class="compare">
        <div class="container">
            <div class="row">
              @if(isset($school_checkbox) && $school_checkbox->count() >0)
                   @foreach($school_checkbox as $school)
                <div class="col-md-3 scho-to-compar "><!-- start col-3 -->
                    <div class="cont-scho-com row">
                        <div class="col-md-12 text-center"><img src="{{$school->logo}}" alt="EasySchools-{{$school['name_'.app()->getLocale()]}}-logo">
                            <div>
                                <i class="fa fa-star"> {{$school->Rate()}}{{--@foreach($school->rates() as $rate){{$rate->rate}}@endforeach--}}</i>

                            </div>
                            <h4 class="colo-str-cor">{{$school['name_'.app()->getLocale()]}}</h4>
                            <p><span class="colo-smo-cor">Student Number :</span> <span class="colo-smo-cor-o"> {{$school->student_num}}</span></p>
                            <div class="col-md-12">
                                <div class="col-md-6 pull-left colo-smo-cor"><p></p></div>
                                <div class="col-md-6 pull-right">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div><!-- ed col-3 -->
               @endforeach
                @endif
            </div><!-- row -->
        </div><!-- container -->
    </section>

    <div class="container">

        <div class="col-xs-12" style="margin-bottom: 50px">
            <hr class="hr-text" data-content="Facilities">
        </div>
    </div>

    <!-- ============================================ Start section FAcilities ======================================= -->

    <section >
        <div  class="container co-facili" >
            <div class="row" >


                <div class="col-md-12 table-responsive">
                    <br>
                    <table  style="width: 100%" class="table-facilities ">
                        <tbody class="text-center">
                        <tr class="text-center imag-sco-com">
                            <td width="20%" class="text-center" style="color: #053460; font-weight: bold"><p>Student Type</p></td>
                            @if(isset($school_checkbox) && $school_checkbox->count() >0)
                                @foreach($school_checkbox as $school)
                            <td width="20%"><img  src="{{url($school->logo)}}" alt="EasySchools-{{$school['name_'.app()->getLocale()]}}"><p>
                                 <?php

                                    $id = App\FacilityValueSchool::where('school_id',$school->id)->value('facility_value_id');
                                    $student_type = App\FacilityValue::where('id',$id)->where('facility_type_id',1)->value('name_'.app()->getLocale());
                                    ?>
                                    @if($student_type)
                                        </p>{{$student_type}}
                                    @else
                                        {{'__'}}
                              @endif
                                 </td>
                                @endforeach
                                @endif
                        </tr>
                        <tr>
                            <td style="color: #053460; font-weight: bold">School Type</td>
                            @if(isset($school_checkbox) && $school_checkbox->count() >0)
                            @foreach($school_checkbox as $school)
                            <td>
                                <?php
                                $id = App\FacilityValueSchool::where('school_id',$school->id)->get(['facility_value_id']);
                                 $school_type = App\FacilityValue::whereIn('id',$id)->where('facility_type_id',2)->get(['name_'.app()->getLocale()]);
                                ?>
                                @if($school_type)
                                        @foreach($school_type as $value)
                                            {{$value['name_'.app()->getLocale()]}}<br>
                                        @endforeach                                    @else
                                    {{'__'}}
                                @endif
                            </td>
                                @endforeach
                            @endif

                        </tr>
                        <tr>
                            <td style="color: #053460; font-weight: bold">Certificate </td>
                            @if(isset($school_checkbox) && $school_checkbox->count() >0)
                                @foreach($school_checkbox as $school)
                            <td>
                                <?php
                                $id = App\FacilityValueSchool::where('school_id',$school->id)->get(['facility_value_id']);
                                $school_certificate = App\FacilityValue::whereIn('id',$id)->where('facility_type_id',3)->get(['name_'.app()->getLocale()]);
                                ?>
                                    @if($school_certificate)
                                        @foreach($school_certificate as $value)
                                        {{$value['name_'.app()->getLocale()]}}<br>
                                        @endforeach
                                    @else
                                    {{'__'}}
                                    @endif
                            </td>
                                @endforeach
                            @endif
                        </tr>
                        <tr>
                            <td style="color: #053460; font-weight: bold">Languages</td>
                            @if(isset($school_checkbox) && $school_checkbox->count() >0)
                                @foreach($school_checkbox as $school)
                            <td>
                                <?php
                                $id = App\FacilityValueSchool::where('school_id',$school->id)->get(['facility_value_id']);
                                $school_Language = App\FacilityValue::whereIn('id',$id)->where('facility_type_id',4)->get(['name_'.app()->getLocale()]);
                                ?>
                                @if($school_Language)
                                    @foreach($school_Language as $value)
                                    {{$value['name_'.app()->getLocale()]}}<br>
                                    @endforeach

                                @else
                                    {{'__'}}
                                    @endif
                            </td>
                                @endforeach
                                @endif

                        </tr>
                        <tr>
                            <td style="color: #053460; font-weight: bold">Education level</td>
                            @if(isset($school_checkbox) && $school_checkbox->count() >0)
                                @foreach($school_checkbox as $school)
                            <td>
                                <?php
                                $id = App\FacilityValueSchool::where('school_id',$school->id)->get(['facility_value_id']);
                                $school_education_level = App\FacilityValue::whereIn('id',$id)->where('facility_type_id',5)->get(['name_'.app()->getLocale()]);
                                ?>
                                @if($school_education_level)
                                        @foreach($school_education_level as $value)
                                            {{$value['name_'.app()->getLocale()]}}<br>
                                        @endforeach

                                    @else
                                        {{'__'}}
                                    @endif
                            </td>
                                @endforeach
                            @endif
                        </tr>
                        <tr>
                            <td style="color: #053460; font-weight: bold" class="tab-faci-comp">Other data</td>
                            @if(isset($school_checkbox) && $school_checkbox->count() >0)
                                @foreach($school_checkbox as $school)
                            <td>

                                <?php
                                $id = App\FacilityValueSchool::where('school_id',$school->id)->get(['facility_value_id']);
                                $school_Other_data = App\FacilityValue::whereIn('id',$id)->where('facility_type_id',6)->get(['name_'.app()->getLocale()]);
                                ?>
                                @if($school_Other_data)
                                        @foreach($school_Other_data as $value)
                                            {{$value['name_'.app()->getLocale()]}}<br>
                                        @endforeach
                                    @else
                                    {{'__'}}
                                    @endif
                            </td>
                                @endforeach
                            @endif
                        </tr>
                        <tr>
                            <td style="color: #053460; font-weight: bold" class="tab-faci-comp">Fees</td>
                            @if(isset($school_checkbox) && $school_checkbox->count() >0)
                                @foreach($school_checkbox as $school)
                                <td>
                                    @foreach($school->fees as $fee)
                                        @if($fee->amount !=0)
                                            {{$fee->amount}}{{$fee->unit}},
                                        @endif
                                    @endforeach
                                </td>

                                @endforeach
                                @endif
                        </tr>
                        </tbody>
                    </table><!-- end table -->
                    <br>
                </div>


            </div>
        </div>
    </section>
@endsection
@section('script')

    <script>
        $(document).ready(function () {
            $("input[class='vehicle']").change(function () {
                var maxAllowed = 4;
                var cnt = $("input[class='vehicle']:checked").length;
                if (cnt > maxAllowed)
                {
                    $(this).prop("checked","");
                    alert('Select maximum ' + maxAllowed + ' Levels!');
                }
            });
        });


    </script>

    <script>

        $('.cor-s-t-c').click(function (){
            // console.log('Clicked');
            // if ($(this).siblings('input').val(true))
            // {
                $(this).toggleClass('background-comp');
//        } else
//            $(this).addClass('background-comp');
//             }
        });


           // $('.cor-s-t-c').click(function (){
           //     console.log('Clicked');
           //     if ($(this).parent().find('input').is(':checked')) {
           //         $(this).removeClass('background-comp');
           //     } else
           //         $(this).addClass('background-comp');
           //
           // });

        // $(window).on('load',function(){
        //     $('#myModal').modal('show');
        // });
    </script>
@stop
