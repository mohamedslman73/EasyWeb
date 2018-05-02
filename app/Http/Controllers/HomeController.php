<?php

namespace App\Http\Controllers;

use App\Article;
use App\Content;
use App\District;
use App\FixedImage;
use App\Mail\SolutionMail;
use App\Partner;
use App\School;
use App\SiteSeoOption;
use App\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::limit(12)->get();
        $schools=School::where('active',1)->where('show',1)->get(['id','logo','name_ar','name_en','about_en','about_en','slug_en','slug_ar']);
        //$textContent=Content::pluck('text_'.app()->getLocale(),'id');
        $seo=SiteSeoOption::find(1);
        $districts=District::where('show',1)->get(['name_'.app()->getLocale(),'slug_'.app()->getLocale()]);
        return view('index',compact('textContent','schools','districts','articles','seo'));
    }

    public function displayPartner()
    {
        $partners=Partner::all();
        return view('website.partners',compact('partners'));
    }

    public function terms()
    {
        return view('website.terms&conditions');
    }

    public function sendMail(Request $request)
    {
        $this->validate($request,[
            'name'      =>'required',
            'position'  =>'required',
            'email'     =>'required|email',
            'phone'     =>'required',
            'school'    =>'required',
        ]);
        $data=[];
        $data['name']=$request->name;
        $data['school']=$request->school;
        $data['position']=$request->position;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        Mail::to('marwanelkahky@easyschools.org')->send(new TermsInfo($data));

        return redirect()->back()->with('message','thanks for info');
    }
    public function displayPartnerAgreement()
    {
        return view('website.partnerAgreement');
    }
    public function displayPrivacy()
    {
        return view('website.privacy');
    }


    public function info()
    {

        $schools=School::where('active',1)->where('show',1)->get(['logo','name_ar','name_en','about_en','about_en','slug_en','slug_ar']);
        $partners=Partner::all();
        $textContent=Content::where('page_name','info')->pluck('text_'.app()->getLocale(),'name');
        $images=FixedImage::pluck('image','id');
        $text=Content::where('name','=','address')->get();
        return view('website.info',compact(  'text','textContent','partners','schools', 'images'));
    }
    //solutions
    public function getSolutions()
    {
        $seo=SiteSeoOption::where('title','solutions')->first();
        $textContent=Content::where('page_name','solution')->pluck('text_'.app()->getLocale(),'name');
        return view('website.user.solutions',compact('textContent','seo'));
    }
    public function postSolutions(Request $request)
    {
        // dd($request->all());

        $this->validate($request,[
            'name'                =>'required',
            'phone'               =>'required',
            'school_name'         =>'required',
            'email'               =>'required|email',
            'school_website'      =>'required|url',
            'school_city'         =>'required',
        ]);

        $solution = new Solution();
        $solution->name = $request->name;
        $solution->phone = $request->phone;
        $solution->school_name = $request->school_name;
        $solution->email = $request->email;
        $solution->school_website = $request->school_website;
        $solution->school_city = $request->school_city;
        $solution->comment = $request->comment;
       // return $solution;
        //marwanelkahky@easyschools.org
        $save=$solution->save();
        Mail::to('marwanelkahky@easyschools.org')->send(new SolutionMail($solution));
        if ($save)
        {
            return redirect()->back()->with('message','thanks for your request');
        }
        return back()->back()->with('message','please try again.');
    }
    //articles
    public function getAllArticles()
    {
        $articles=Article::all();
        $seo=SiteSeoOption::where('title','solutions')->first();
        return view('website.articles',compact('articles','seo'));
    }
    public function getAnArticle($lang,$article)
    {
        $otherArticles=Article::inRandomOrder()->limit(3)->get();
        $article=Article::find($article);
        $schools=School::inRandomOrder()->limit(6)->get();
        $seo=SiteSeoOption::where('title','solutions')->first();
        return view('website.displayArticle',compact('article','seo','otherArticles','schools'));
    }
}
