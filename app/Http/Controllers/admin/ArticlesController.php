<?php

namespace App\Http\Controllers\admin;

use App\Article;
use App\ArticleFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class ArticlesController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::all();
        return view('admin.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title_ar'=>'required',
            'title_en'=>'required',
            'log'=>'required',
            'text_ar'=>'required',
            'text_en'=>'required',
        ]);
        if($request->hasFile('log')){
            $logo=$request->file('log')->store('articles/logo');
            $request->merge(['logo'=>$logo]);
        }
        $article=Article::create($request->all());
        if ($request->has('images')){
            $images=$request->images;
            $text_ar=$request->img_text_ar;
            $text_en=$request->img_text_en;
            for($i=0;$i<count($images);$i++){
                ArticleFile::create([
                    'image'=>$images[$i]->store('articles/images'),
                    'img_text_ar'=>$text_ar[$i],
                    'img_text_en'=>$text_en[$i],
                    'article_id'=>$article->id,
                ]);
            }
        }

        return redirect('/lead/articles');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request,[
            'title_ar'=>'required',
            'title_en'=>'required',
            'text_ar'=>'required',
            'text_en'=>'required',
        ]);
        if($request->hasFile('log')){
            $logo=$request->file('log')->store('articles/logo');
            $request->merge(['logo'=>$logo]);
        }
        $article->update($request->all());
        if($request->has('edit_img_text_ar')){
            $edit_text_ar=$request->edit_img_text_ar;
            $edit_text_en=$request->edit_img_text_en;
            $image_id=$request->image_id;
            for($i=0;$i<count($edit_text_ar);$i++){
                ArticleFile::find($image_id[$i])->update([
                'img_text_ar'=>$edit_text_ar[$i],
                'img_text_en'=>$edit_text_en[$i],
                ]);
            }
        }
        if ($request->has('images')){
            $images=$request->images;
            $text_ar=$request->img_text_ar;
            $text_en=$request->img_text_en;
            for($i=0;$i<count($images);$i++){
                ArticleFile::create([
                    'image'=>$images[$i]->store('articles/images'),
                    'img_text_ar'=>$text_ar[$i],
                    'img_text_en'=>$text_en[$i],
                    'article_id'=>$article->id,
                ]);
            }
        }
        return redirect('/lead/articles');
    }

    /**
     * delete image
     */
    public function deleteArticleFile($articleFileId)
    {
            ArticleFile::find($articleFileId)->delete();
            return back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return back();
    }
        /*
    public function datatable()
    {
        $articles=Article::all();
        return view('admins.articles.index',compact('articles'));
         * return Datatables::of($leads)
            ->editColumn('control',function ($model){
                $data=renderOptions($model,'ArticlesController','articles');
                return $data;
            })
            ->make(true);
    }
        */
}
