<?php

namespace App\Http\Controllers\admin;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;


class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.questions.index');
    }


    public function edit(Question $question)
    {
        return view('admin.questions.displayQuestion',compact('question'));
    }

    public function destroy(Question $question)
    {

        $question->delete();
        return back();
    }

    public function datatable()
    {
        $questions=Question::all();

        return Datatables::of($questions)
            ->editColumn('control',function ($model){
                $data=renderOptions($model,'QuestionsController','questions');
                return $data;
            })
            ->make(true);
    }
    public function deleteAnswer($answer_id)
    {
        Answer::find($answer_id)->delete();
        return back();
    }


/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


}
