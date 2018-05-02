<?php

function loadOption($option)
{
    $option = \App\Settings::getOption($option);
    return $option;
}

function loadFacility($id)
{
    $facilitesArray = \App\FacilityValue::get()->keyBy('id');
    return (@$facilitesArray[$id])?$facilitesArray[$id]:null;
}

function loadAsset($path)
{

    $url = 'https://d2az00w0qjkl3l.cloudfront.net';

    return url($path);
    // return $url.'/'.$path;

}
function renderOptions($model,$action,$editUrl="/",$editOnly = false)
{
    $str ='';
    if($editOnly){
        $str.="<a class='btn btn-warning btn-sm' href='".loadAsset("/lead/".$editUrl."/".$model->id.'/edit')."'><i class='fa fa-edit'></i>Edit</a>";
    }else{
        $str.=Form::open(['method'=>'DELETE','action'=>["admin\\$action@destroy",$model]]);
        $str.="<a class='btn btn-warning btn-sm' href='".loadAsset("/lead/".$editUrl."/".$model->id.'/edit')."'><i class='fa fa-edit'></i>Edite</a>";
        $str.="<button onClick=\"return confirm('Are you sure to DELETE this Record ?')\" class=\"btn btn-danger btn-sm\"><i class=\"fa fa-trash\"></i>Delete</button>";
        $str.=Form::close();
    }
    return $str;
}

//render action
function renderAction($model,$action,$method,$status)
{
    $str ='';
    $str.=Form::open(['action'=>["admin\\$action@$method",$model]]);
    if($status==0){
        $str.="<button onClick=\"return confirm('Are you sure to $method this Record ?')\" class=\"btn btn-danger btn-icon-only\"><i class=\"fa fa-times\"></i></button>";
    }else{
        $str.="<button onClick=\"return confirm('Are you sure to De$method this Record ?')\" class=\"btn btn-success btn-icon-only\"><i class=\"fa fa-check\"></i></button>";
    }
    $str.=Form::close();
    return $str;
}
//change schools favorite
function renderFavorite($school_id)
{
    $like="<form action='' method=''>";

    $str ='';
    $model=\App\Favorite::all();
    $query=App\Favorite::where('school_id',$school_id)->where('user_id',Auth::user()->id)->get();
    if(!count($query)==1){
        $str.="<form action=".route('user.addFavorite',['lang'=>app()->getLocale()])." method='post'>";
        /* $str.=Form::open(['action'=>'front\UserController@addFavoriteSchool',$model]);*/
        $str.="<input type='hidden' value='$school_id' name='school'>";
        $str.="<button onClick=\"return confirm('Are you sure to Add this School to Favorite ?')\"class=\"rating pull-right love-to love-bu2\"><span></span><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i></button>";
        $str.=Form::close();
    }else{
        $str.="<form action=".route('user.deleteFavorite',['lang'=>app()->getLocale()])." method='post'>";
        //$str.=Form::open(['action'=>'front\UserController@deleteFavoriteSchool',$model]);
        $str.="<input type='hidden' value='$school_id' name='school'>";
        $str.="<button class=\"rating pull-right love-to love-bu2\"><span></span><i class=\"fa fa-heart\" aria-hidden=\"true\"></i></button>";
        $str.=Form::close();
    }
    return $str;
}

//slug
function make_slug($string = null,$lettersCount = 100,$separator = "-")
{
    if (is_null($string)) {
        return "";
    }
    // Remove spaces from the beginning and from the end of the string
    $string = trim($string);
    // Lower case everything
    $string = mb_strtolower($string, "UTF-8");
    // letters and numbers only with arabic letters too
    $string = preg_replace("/[^a-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);
    // Remove multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    // Convert whitespaces and underscore to the given separator
    $string = preg_replace("/[\s_]/", $separator, $string);
    //limit slug to  $lettersCount = (100)
    return str_limit($string, $lettersCount, '');
}

function assetCDN($path)
{
    $url = 'https://d2az00w0qjkl3l.cloudfront.net';
    return $url.'/'.$path;
}
