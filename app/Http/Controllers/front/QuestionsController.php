<?php

namespace App\Http\Controllers\front;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    public function displayCommunity()
    {
        $questions=Question::all();
        return view('website.questions',compact('questions'));
    }
    /*public function displayQuestions()
    {
        return view('website.answers');
    }*/
    public function addQuestion(Request $request)
    {
        $this->validate($request,[
            'username'  =>'required',
            'email'     =>'required',
            'question'  =>'required',
        ]);
        $question=Question::create($request->all());
        if($question){
        return redirect()->back()->with('message','thanks for question.');
        }
        return redirect()->back()->with('message','please try again.');
    }

    public function communitySearch(Request $request)
    {
        $questions=Question::where('question','LIKE','%'.$request->search.'%')->get();
        return view('website.questions',compact('questions'));
    }

    public function displayQuestion($lang,$q_id)
    {
        $question=Question::find($q_id);
        return view('website.displayQuestion',compact('question'));
    }

    public function addAnswer(Request $request)
    {
        $this->validate($request,[
                                   'username'=>'required',
                                   'email'=>'required',
                                   'answer'=>'required',
        ]);
        $request->merge(['question_id'=>$request->question]);
        $answer=Answer::create($request->all());
        return back();
    }
}
