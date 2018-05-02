<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use samdark\sitemap\Sitemap;
use samdark\sitemap\Index;
use App\SeoLink;
use App\City;
use App\School;


class SitemapController extends Controller
{
  public function index(Request $request){
    if($request->password != 'easyschools2050')
    {
      return 'invalid request';
    }

    $links    = SeoLink::all();
    $cities   = City::all();
    $schools  = School::all();

    // create sitemap
    $sitemap = new Sitemap(__DIR__ . '/../../../public/sitemap.xml');
    $sitemap->setMaxUrls(50000);
    // add some URLs
    $sitemap->addItem('https://www.easyschools.org/en/login');
    $sitemap->addItem('https://www.easyschools.org/ar/login');

    $sitemap->addItem('https://www.easyschools.org/en/register');
    $sitemap->addItem('https://www.easyschools.org/ar/register');

    $sitemap->addItem('https://www.easyschools.org/en/schools');
    $sitemap->addItem('https://www.easyschools.org/ar/schools');

    $sitemap->addItem('https://www.easyschools.org/en/schools/advsearch');
    $sitemap->addItem('https://www.easyschools.org/ar/schools/advsearch');

    $sitemap->addItem('https://www.easyschools.org/en/allLinks');
    $sitemap->addItem('https://www.easyschools.org/ar/allLinks');

    foreach ($cities as $city){
      $sitemap->addItem('https://www.easyschools.org/en/schools/'. str_replace(' ', '-', $city->name_en));
      $sitemap->addItem('https://www.easyschools.org/ar/schools/'. str_replace(' ', '-', $city->name_en));
    }

    foreach ($schools as $school) {
      $sitemap->addItem('https://www.easyschools.org/en/schoolProfile/'. $school->slug_en);
      $sitemap->addItem('https://www.easyschools.org/ar/schoolProfile/'. $school->slug_en);
    }

    // //Links
    foreach ($links as $link) {
      $sitemap->addItem('https://www.easyschools.org/en/classification/'. $link->url);
      $sitemap->addItem('https://www.easyschools.org/en/classification/'. $link->url);
    }

    // write it
    $sitemap->write();
    return "Done";
  }
}
