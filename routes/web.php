<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/solutions','front\UserController@getSolutions');
//Route::post('solutions','front\UserController@postSolutions')->name('solutions');
/*Route::get('/', 'HomeController@index');*/

    Route::get('auth/{provider}', 'front\SocialAuthController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'front\SocialAuthController@handleProviderCallback');

    Route::get('/aws', function(){

        return assetCDN('uploads/schools/logo/w58ZVsTcRDORG3vDzo6PIRpfupR5c9GLwwcxW4st.jpeg');
    });
    /*Route::get('/amp/index', 'AmpController@index')->name('ampIndex');*/
    Route::get('createSitemap', 'SitemapController@index');
    Route::get('/createSeoLinks', 'front\SeoController@createLinks');

    Route::get('/classification/{url}', 'front\SeoController@getSchools')->name('classification');
    Route::get('/sitemap', 'front\SeoController@getAllLinks')->name('allLinks');

    //admin
    Route::group(['prefix'=>'lead'],function(){

    Route::group(['middleware'=>'throttle:5,3'],function() {
        Route::get('login', 'admin\LoginController@login');
        Route::post('login', 'admin\LoginController@doLogin')->name('admin.postLogin');
    });

        Route::group(['middleware'=>'throttle:3,5'],function (){
        Route::get('login','admin\LoginController@login');
        Route::post('login','admin\LoginController@doLogin')->name('admin.postLogin');
        });

        Route::group(['middleware'=>'auth:lead'],function(){
            Route::get('/',function (){
                return View('admin.layout');
            });
            Route::get('countries/dtAjax','admin\CountriesController@datatable');
            Route::resource('countries','admin\CountriesController');
            Route::get('cities/dtAjax','admin\CitiesController@datatable');
            Route::resource('cities','admin\CitiesController');
            Route::get('districts/dtAjax','admin\DistrictsController@datatable');
            Route::resource('districts','admin\DistrictsController');
            Route::post('districts/show/{district}  ','admin\DistrictsController@showDistrict');
            Route::get('leads/dtAjax','admin\AdminsController@datatable');
            Route::resource('leads','admin\AdminsController');
            Route::get('schools/deleteImage/{image}','admin\SchoolsController@deleteImage');
            Route::get('schools/dtAjax','admin\SchoolsController@datatable');
            Route::get('schools/regionsJson','admin\SchoolsController@regionsJson');
            Route::post('schools/activate/{school}','admin\SchoolsController@activate');
            Route::post('schools/verify/{school}','admin\SchoolsController@verify');
            Route::post('schools/show/{school}  ','admin\SchoolsController@showSchool');
            Route::resource('schools','admin\SchoolsController');
            Route::get('partners/dtAjax','admin\PartnersController@datatable');
            Route::post('partners/activate/{partner}','admin\PartnersController@activate');
            Route::resource('partners','admin\PartnersController');
            Route::get('users/dtAjax','admin\UsersController@datatable');
            Route::post('schools/activate/{user}','admin\UsersController@activate');
            Route::resource('users','admin\UsersController');
            Route::get('facilities/dtAjax','admin\FacilitiesController@datatable');
            Route::post('facilities/{facilityValue}/status','admin\FacilitiesController@status');
            Route::resource('facilities','admin\FacilitiesController');
            Route::get('content/dtAjax','admin\MainContentController@datatable');
            Route::resource('content','admin\MainContentController');
            Route::get('images/dtAjax','admin\MainImagesController@datatable');
            Route::resource('images','admin\MainImagesController');
            Route::get('questions/dtAjax','admin\QuestionsController@datatable');
            Route::get('questions/deleteAnswer/{id}','admin\QuestionsController@deleteAnswer');
            Route::resource('questions','admin\QuestionsController');
            Route::get('articles/dtAjax','admin\ArticlesController@datatable');
            Route::get('articles/deleteFile/{id}','admin\ArticlesController@deleteArticleFile');
            Route::resource('articles','admin\ArticlesController');
            //seo Routing
            Route::get('siteoption/dtAjax','admin\SiteSeoOptionController@datatable');
            Route::resource('siteoption','admin\SiteSeoOptionController');
           /* Route::get('fixedpage/dtAjax','admin\FixedPageController@datatable');
            Route::resource('fixedpage','admin\FixedPageController');*/
            Route::get('logout','admin\LoginController@logout');
        }); //MiddleWare Group
    });//Prefix Groupp

    //////////////////////////////////// Front /////////////////////////////
    //user
    /*Route::get('/', function (){
        app()->setLocale('en');
        session()->put('lang','en');
        return redirect('/en');
    });*/
    //Data API Helpers
Route::group(['middleware' => 'urlRedirect'], function () {
    Route::get('helper/getCities/{id}', 'HelperController@getCities');
    Route::get('helper/getDistricts/{id}', 'HelperController@getDistricts');
    Route::post('addreplay', 'front\SchoolController@createReplay')->name('reply');

            Auth::routes();
    Route::group(['prefix'=>"{lang?}",'middleware'=>'lang'],function (){
    /*    Route::group(['middleware'=>'language'],function () {*/
            Route::group(['middleware' => 'auth'], function () {
                //schools
                Route::post('/schoolProfile', 'front\SchoolController@createComment')->name('comment');

                Route::get('editrequest', 'front\SchoolController@getEditRequest');
                //users
                Route::get('/userprofile', 'front\UserController@getUser')->name('profile');
                Route::post('/editprofile', 'front\UserController@editUser')->name('user.edit');
                Route::post('/changepassword', 'front\UserController@updatePassword')->name('user.changePassword');
                Route::get('/favorite', 'front\UserController@displayFavorite')->name('favorites');
                Route::post('/addFavorite', 'front\UserController@addFavoriteSchool')->name('user.addFavorite');
                Route::post('/deleteFavorite', 'front\UserController@deleteFavoriteSchool')->name('user.deleteFavorite');
                Route::post('/addCompare', 'front\UserController@addCompare')->name('addCompare');
                Route::post('/deleteCompare', 'front\UserController@addCompare')->name('deleteCompare');
                Route::any('/compare', 'front\UserController@getCompare')->name('compare');
                Route::get('logout', function (){
                    Auth::logout();
                    return redirect('/'.app()->getLocale());
                })->name('logout');
            });
            //   Route::post('/deletefavorite', 'front\UserController@deleteFavoriteSchool');
            Route::post('addschool', 'front\SchoolController@addSchool');
            Route::get('addschool', 'front\SchoolController@getAddSchool');
            Route::post('addschool', 'front\SchoolController@addSchool')->name('addSchoolFront');
            //user login & register
            Route::get('/schoolProfile/{slug}', 'front\SchoolController@singlePage')->name('schoolProfile');
            Route::post('/rate', 'front\SchoolController@rate')->name('rate');

            //login and register

            /*Route::get('/register', 'front\LoginController@register')->name('sign_up');
            Route::post('/doregister', 'front\LoginController@doRegister')->name('user.register');
            Route::get('/login', 'front\LoginController@login')->name('sign_in');
            Route::post('/dologin', 'front\LoginController@dologin')->name('user.login');
            Route::post('/forgetPassword', 'front\UserController@forgetPassword')->name('user.forgetPassword');
            Route::get('/forgetPassword/changePasswordView', 'front\UserController@changePasswordView');
            Route::post('/forgetPassword/changePasswordChange', 'front\UserController@DoChangePassword')->name('user.forgetPasswordChange');*/

            //main and all schools views
            Route::post('/schoolProfile', 'front\SchoolController@createComment')->name('comment');
            Route::get('/', 'HomeController@index');
            Route::get('/home', 'HomeController@index')->name('home');
            Route::get('/info', 'HomeController@info')->name('info');
            Route::get('/partners', 'HomeController@displayPartner')->name('partners');
            Route::get('/termsAndConditions', 'HomeController@terms')->name('termsAndConditions');
            Route::get('/partnerAgreement', 'HomeController@displayPartnerAgreement')->name('partnerAgreement');
            Route::get('/privacy', 'HomeController@displayPrivacy')->name('privacy');
            Route::post('/sendInfo', 'HomeController@sendMail')->name('sendInfo');
            Route::get('/schools', 'front\SchoolController@getAllSchools')->name('schools');
            Route::get('/schools/search', 'front\SchoolController@Search')->name('search');
            Route::get('/schools/advsearch', 'front\SchoolController@advSearch')->name('advSearch');
            Route::get('/schools/classification/{slug}', 'front\SeoController@getSchools')->name('facilitySearCh');
            //solutions
                Route::get('/solutions','HomeController@getSolutions');
                Route::post('solutions','HomeController@postSolutions')->name('solutions');
            //articles
                     Route::get('/articles','HomeController@getAllArticles')->name('articles');
                     Route::get('/articles/showArticles/{article}','HomeController@getAnArticle')->name('showArticle');
                //Route::post('/articles','HomeController@postSolutions')->name('solutions');
            //questions and answers
            Route::get('/schools/autoCompleteSearch', 'front\SchoolController@searchAuto');
            Route::get('/districts', 'front\SchoolController@returnDistrict')->name('districts');
            Route::get('/schools/city/{city}', 'front\SchoolController@getSchoolsCity')->name('schoolsByCity');
            Route::get('/schools/district/{district}', 'front\SchoolController@getSchoolsDistrict')->name('schoolsByDistrict');
            Route::get('/community','front\QuestionsController@displayCommunity')->name('community');
            Route::get('/searchQuestions','front\QuestionsController@communitySearch')->name('searchQuestion');
            Route::post('/addQuestion','front\QuestionsController@addQuestion')->name('addQuestion');
            Route::get('/showQuestion/{q_id}','front\QuestionsController@displayQuestion')->name('displayQuestion');
            Route::post('/addAnswer','front\QuestionsController@addAnswer')->name('answer');
            //  Route::get('/sitemap', 'front\SchoolController@sitemap');
    /*    });*/
    });
});



Route::get('/home', 'HomeController@index')->name('home');


