@extends("layouts.app")
@section('css')
    <link rel="stylesheet" href="{{loadAsset('/')}}/backend/website/css/terms.css">
@endsection
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <!-- hr -->
    <div id="hr" class="text-center">
        <span>Partners Agreement</span>
    </div>
    <!-- hr -->

    <!-- ============ start terms ============ -->
    <section class="terms">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <q class="firstq">
                        These terms and conditions outline the rules and regulations for the use of EasySchools's Website.
                    </q>
                    <p class="firstq">EasySchools is Located at: Egypt</p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">

                    <p>By accessing this website we assume you accept these terms and conditions do not continue to use EasySchools's website if you do not agree to take all of the terms and conditions stated on this page.</p>

                    <p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: <q>Client</q> , <q>You</q> and <q>Your</q> refers to you, the person log on this website and compliant to the company's terms and conditions. The <q>Company</q>, <q>Ourselves</q> , <q>We</q> , <q>Our</q> and <q>Us</q> , refers to our Company. <q>Party</q> , <q>Parties</q> or <q>Us</q> , refers to both the Client and Ourselves. All terms refers to the offer, acceptance and considerations of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client needs in respect of provision of the Company's Stated services, in accordance with and subject to, prevailing law of Egypt. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>

                    <p>By accepting the corporation with our Organization all the information you will provide will only be used for useful purpose to help parents all across Egypt to better know your school so all the information must be true which will require as signature from your respective person furthermore in the aggrement.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ end terms ============ -->

    <!-- hr -->
    <div id="hr">
        <span>Our Agreement</span>
    </div>
    <!-- hr -->

    <!-- ============ start ageement ============ -->
    <div class="agreement">
        <div class="container">
            <div class="row">
                <!-- section number 2 -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4>Our Agreement Will be as follows:</h4>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>1- School admin account on website</p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>2- School visit with interveiw with School Admin</p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>3- Picture of the School Campus (Provided by us during the interveiw)</p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>4- Social Media Advertising for your School</p>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>5- Article about the School</p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>6- Access to Admission area to get students for your school</p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <span>&#42;you can eliminate any type from the agreement above</span>
                </div>

                <!-- section number 2 -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- agreement -->
    <!-- ============ end agreement ============ -->

    <!-- hr -->
    <div id="hr">
        <span>Your information</span>
    </div>
    <!-- hr -->

    <!-- ============= start your information ========== -->
    <section class="your-information">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <q>These terms and conditions outline the rules and regulations for the use of EasySchools's Website.
                    </q>
                    <p>EasySchools is Located at: Egypt</p>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
        <div class="container text-center">
            <div class="row">
                <form action="{{route('sendInfo',['lang'=>app()->getLocale()])}}" method="post">
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-left">
                        <label>Name:</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
                        <input type="text" name="name">
                        <small class="text-danger">{{$errors->first('name')}}</small>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-left">
                        <label>School name:</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <input type="text" name="school">
                        <small class="text-danger">{{$errors->first('school')}}</small>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-left">
                        <label>School position:</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <input type="text" name="position">
                        <small class="text-danger">{{$errors->first('position')}}</small>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-left">
                        <label>Email:</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <input type="email" name="email">
                        <small class="text-danger">{{$errors->first('email')}}</small>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-left">
                        <label>Mobile number:</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <input type="text" name="phone">
                        <small class="text-danger">{{$errors->first('phone')}}</small>
                    </div>
                    <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12 text-left">
                        <span>&#42;Kindly note that this package is for free to the first 20 schools register with us</span>
                    </div>
                    <div class="col-lg-2 col-lg-offset-3 col-md-4 col-sm-12 col-xs-12">
                        <input type="submit" value="Submit">
                    </div>
                </form>

            </div><!-- .row -->
        </div><!-- .container -->

        <!--  -->
    </section>
    <!-- ============= end your information ========== -->
@stop