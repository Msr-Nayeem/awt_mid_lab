<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function profile()
    {
        $name = "Nayeem";
        $id = "18-38037-2";
        $info = array("Msr ", "Dinajpur");
        return view('profile')
        ->with('name', $name)
        ->with('id', $id)
        ->with('info', $info);
    }
    
    public function home(){
        return view('home');
    }
    public function contact(){
        return view('contact');
    }
    public function service(){
        $Services = array("Web application", "Desktop application", "Portfolio", "Financial application");
        return view('service')->with('services', $Services);
    }
    public function about(){
        return view('about');
    }
    public function ourteam(){
        return view('ourteam');
    }
}
