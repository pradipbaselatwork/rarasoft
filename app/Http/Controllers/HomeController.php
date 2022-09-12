<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Font;
use App\Company;
use App\Profession;
use App\Service;
use App\Business;
use App\Project;
use App\Navbar;
use App\About;
use App\Ourteam;
use App\Allbanner;
// use App\Contact;

class HomeController extends Controller
{
    
    public function index()
    {
        $navbar= Navbar::with('subcategories')->where('parent_id',0)->get();

        $banner= Banner::get();
        $company= Company::get();
        $font= Font::get();
        $profession= Profession::get();
        $service= Service::get();
        $business= Business::get();
        $project= Project::limit(2)->get();
        $banner= Banner::get();
      
        return view('front.home', compact('banner','font','company','profession','service','business','project'));
    }

    public function nav($url=null)
    {
        if($url == "About")
        {
            $about= About::get();
            $company= Company::get();
            return view('front.about',compact('about','company'));
        }


        if($url == "Ourteam")
        {
            $ourteam= Ourteam::get();
            return view('front.ourteam',compact('ourteam'));
        }

        if($url == "Services")
        {
            $service= service::get();
            return view('front.service',compact('service'));
        }

        if($url == "Projects")
        {
            $project= Project::get();
            return view('front.project',compact('project'));
        }

        if($url == "Contact")
        {
            // $contact= Contact::get();
            return view('front.contact');
        }

        return view('error.404');


    }

    // public function ourteamhome()
    // {    
    //     $ourteam= Ourteam::get();
    //     return view('front.ourteam',compact('ourteam'));
    // }
}
