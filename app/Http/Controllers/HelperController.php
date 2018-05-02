<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;
use App\District;

class HelperController extends Controller
{
  public function getCities($id){
    $cities = City::select('id', 'name_en', 'name_ar', 'country_id')->where('country_id', $id)->get();
    return response()->json($cities);
  }

  public function getDistricts($id){
    $districts = District::select('id', 'name_en', 'name_ar', 'city_id')->where('city_id', $id)->get();
    return response()->json($districts);
  }

  public function getBlogArticles()
  {
    $url='https://easyschools.org/blog/wp-json/wp/v2/posts';
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_POST, 0);

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, []);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($ch);

    curl_close($ch);
    $articles = json_decode($output);

    return $articles;
  }
}
