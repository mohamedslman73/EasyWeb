<?php
namespace App\Http\Controllers;
use App\Comment;
use App\School;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

            $comments = Comment::all();
            return view('website.profileschool', ['comments' => $comments]);
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

            $this->validate($request, [
                'body' => 'required',
                'user_id' => 'required',
                'school_id' => 'required',

            ]);
/*            dd($request->all());*/
            Comment::create($request->all());
            $school = School::find($request->school_id);

            return back();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /*to display datatables
      */
    public function datatable()
    {
        $comments=Comment::all();

        return DataTables::of($comments)
            ->editColumn('control',function ($model){
                $data=renderOptions($model,'CommentsController','comments');
                return $data;
            })
            ->make(true);
    }
}
